<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])



<!-- Font Awesome from CDN -->
<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />



    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white fixed h-full px-4 py-6">
        <h1 class="text-xl font-bold mb-6 text-center">Dashboard</h1>

        <ul>
            <li class="mb-4">
                <a href="{{ route('doctors.index') }}" class="flex items-center hover:text-gray-300">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> Doctors
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('students.index') }}" class="flex items-center hover:text-gray-300">
                    <i class="fa-solid fa-user-graduate mr-2"></i> Students
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('departments.index') }}" class="flex items-center hover:text-gray-300">
                    <i class="fa-solid fa-building mr-2"></i> Departments
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('employees.index') }}" class="flex items-center hover:text-gray-300">
                    <i class="fa-solid fa-users mr-2"></i> Employees
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('courses.index') }}" class="flex items-center hover:text-gray-300">
                    <i class="fa-solid fa-book mr-2"></i> Courses
                </a>
            </li>
        </ul>
        {{-- <h1 class="text-3xl">اختبار الأيقونة <i class="fa-solid fa-user"></i></h1> --}}

    </div>

    <!-- Main Content -->
    <div class="flex-1 ml-67">
        <!-- Top Navbar -->
        <nav class="bg-white shadow px-6 py-4 fixed w-[calc(100%-16rem)] ml-64 z-10">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold text-gray-800">
                    Uni
                </div>
            <div class="flex items-center space-x-6">
     <a href="{{ route('profile') }}" class="flex items-center space-x-2 text-gray-800 hover:text-blue-500">
        <i class="fa-solid fa-user text-2xl"></i>
        <span>Profile</span>
    </a>
</div>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </nav>

        <!-- Page Content -->
        <main class="mt-20 px-6 py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
