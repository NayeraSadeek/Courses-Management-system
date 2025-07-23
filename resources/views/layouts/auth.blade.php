<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Auth</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{-- For Mix --}}

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-M9A+7UgGxM4HdHY0wJ2n2Zv0hRJ4/YfNNQxJ2gQ2Gj+InwMguhs9ZvZLQwWxK6JzH3DdI24dR3B1axVMR+j1yA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <main class="w-full px-4">
        @yield('content')
    </main>

</body>
</html>
