@extends('layouts.auth')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <input id="password" type="password" name="password"
                    required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-gray-700">Remember Me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
