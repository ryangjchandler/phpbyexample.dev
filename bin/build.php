<?php

namespace PhpByExample;

require_once __DIR__ . '/../vendor/autoload.php';

use DirectoryIterator;
use FilesystemIterator;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use RyanChandler\Blade\Blade;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;
use Spatie\Watcher\Watch;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use SplFileInfo;

final class Configuration
{
    public readonly string $build;

    public readonly string $content;

    public readonly bool $watch;

    public function __construct(array $argv)
    {
        $this->build = __DIR__ . '/../public';
        $this->content = __DIR__ . '/../content';
        $this->watch = in_array('--watch', $argv);
    }
}

final class Generator
{
    private Blade $blade;

    private string $views = __DIR__ . '/../resources/views';

    private string $resources = __DIR__ . '/../resources';

    public function __construct(private Configuration $configuration)
    {
        $this->blade = Blade::new($this->views, __DIR__ . '/../cache');
    }

    public function run(): void
    {
        $this->build();

        if (! $this->configuration->watch) {
            return;
        }

        Watch::paths($this->resources, $this->views, $this->configuration->content)
            ->onAnyChange(function () {
                $this->build();
            })
            ->start();
    }

    private function build(): void
    {
        echo "\x1b[32;1mBuilding...\x1b[0m\n";

        $start = microtime(true);
        $iterator = new FilesystemIterator($this->configuration->content, FilesystemIterator::SKIP_DOTS);

        foreach ($iterator as $file) {
            $this->buildFile($file);    
        }

        echo "\x1b[32;1mFinished... took " . (number_format(microtime(true) - $start, 2)) . "s.\x1b[0m\n";
    }

    private function buildFile(SplFileInfo $file)
    {
        $filename = basename($file->getFilename(), ".{$file->getExtension()}");
        $document = YamlFrontMatter::parseFile($file->getRealPath());
        $output = sprintf("%s/%s.html", $this->configuration->build, $filename);

        if (file_exists($output) && filemtime($output) > $file->getMTime()) {
            echo "  ⟶  \x1b[33;3mSkipping {$filename} as content is up-to-date.\x1b[0m\n";
            return;
        }

        $template = $this->blade->exists($filename) ? $filename : 'single';
        $rendered = (string) $this->blade->make($template, [
            ...$document->matter(),
            'content' => $this->markdownToHtml($document->body()),
        ]);

        file_put_contents($output, $rendered);

        echo "  ⟶  \x1b[33;3mCompiled {$filename} to " . basename($output) . ".\x1b[0m\n";
    }

    private function markdownToHtml(string $markdown): string
    {
        $converter = new GithubFlavoredMarkdownConverter();
        $converter->getEnvironment()->addExtension(new HighlightCodeExtension('github-dark'));

        return $converter->convert($markdown);
    }

    public function ensureBuildDirectoryExists(): void
    {
        if (! is_dir($this->configuration->build)) {
            mkdir($this->configuration->build, 0755);
        }
    }
}

function main(array $argv) {
    $generator = new Generator(new Configuration($argv));
    $generator->ensureBuildDirectoryExists();
    $generator->run();
}

main($argv);