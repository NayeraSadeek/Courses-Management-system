@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen">

<div class="max-w-2xl mx-auto mt-16 bg-white shadow-2xl rounded-2xl p-8 border border-gray-200">
    <h2 class="text-3xl font-extrabold mb-6 text-center text-gray-800 tracking-wide">
        👤 Profile
    </h2>

    <div class="space-y-6 text-lg text-gray-700 leading-relaxed">
        <p>
            <span class="font-semibold text-gray-900">Name:</span>
            {{ $user->name }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Email:</span>
            {{ $user->email }}
        </p>
        <p>
            <span class="font-semibold text-gray-900">Role:</span>
            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full
                @if($user->role === 'doctor') bg-blue-100 text-blue-800
                @else bg-green-100 text-green-800 @endif">
                {{ ucfirst($user->role) }}
            </span>
        </p>
        <p>
            <span class="font-semibold text-gray-900">Member Since:</span>
            {{ $user->created_at->format('d M Y') }}
        </p>
    </div>

    <div class="mt-8 text-center">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition-colors duration-300">
           Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </div>
</div>
@endsection
