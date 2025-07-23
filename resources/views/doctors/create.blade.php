@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Add Doctor</h2>

    <form action="{{ route('doctors.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Specialization</label>
            <input type="text" name="specialization" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2 mt-1" required>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
            <a href="{{ route('doctors.index') }}" class="text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
