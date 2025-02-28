<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <header class="fixed top-0 w-full">
        @include('header')
    </header>

    <main class="flex justify-center border">
        @yield('content')
    </main>

    <footer class="fixed bottom-0 w-full">
        @include('footer')
    </footer>
</body>

</html>