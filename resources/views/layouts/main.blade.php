<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    @isset($title)
        <title>{{ $title }} | PHP by Example</title>
    @else
        <title>PHP by Example</title>
    @endisset
</head>
<body class="antialiased font-sans bg-white max-w-3xl mx-auto pb-12">
    <header class="py-12">
        <a href="/">
            <h1 class="text-3xl font-bold">
                PHP by Example
            </h1>
        </a>
    </header>

    <main class="prose prose-sky">
        @yield('content')
    </main>
</body>
</html>