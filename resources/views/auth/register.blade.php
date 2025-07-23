@extends('layouts.auth')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registration</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            </div>
               <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="specialization"> Specialization</label>
                <input id="specialization" type="text" name="specialization" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            </div>

            <div class="mt-4">
             <label for="role" class="block text-gray-700 mb-2">Register As:</label>
             <select id="role" name="role"
              class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
             <option value="student">Student</option>
             <option value="doctor">Doctor</option>
             </select>
             </div>
<br>
            <button type="submit"
                class="w-full bg-green-500 text-white py-3 px-2 rounded hover:bg-green-300">
                Register
            </button>
        </form>

        <p class="text-center text-gray-600 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-green-500 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection
