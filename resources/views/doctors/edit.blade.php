@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Doctor</h2>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" value="{{ $doctor->name }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Specialization</label>
            <input type="text" name="specialization" value="{{ $doctor->specialization }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" value="{{ $doctor->email }}" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            <a href="{{ route('doctors.index') }}" class="text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
