@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-6">Profile</h2>

    <div class="flex items-center space-x-6">
        <!-- Profile Avatar -->
        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-4xl">
            <i class="fas fa-user"></i>
        </div>

        <!-- Profile Details -->
        <div>
            <h3 class="text-xl font-bold text-gray-800">
                {{ Auth::user()->name }}
            </h3>
             <h3 class="text-xl font-bold text-gray-800">
                {{ Auth::user()->phone }}
            </h3>
            <p class="text-gray-600">
                {{ Auth::user()->email }}
            </p>
            <p class="text-sm text-gray-500 mt-1">
                Member since: {{ Auth::user()->created_at->format('F j, Y') }}
            </p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ url('/profile') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Edit Profile
        </a>
    </div>

    <div class="mt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
