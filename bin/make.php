<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Support\Str;

$stub = <<<'md'

md;

function ask(string $question): string {
    return trim(readline($question . ' '));
}

function main() {
    $title = ask('What is the name of the new page?');
    
    $defaultSlug = Str::slug($title);
    $slug = ask('What is the slug of the new page? (' . $defaultSlug . ')') ?: $defaultSlug;

    file_put_contents(__DIR__ . '/../content/' . $slug . '.md', sprintf(<<<'md'
    ---
    title: %s
    next: []
    ---

    md, $title));

    echo "\x1b[32;1mPage {$slug}.md created.\x1b[0m\n";
}

main();