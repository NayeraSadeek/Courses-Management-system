@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Add Department</h2>

    <form action="{{ route('departments.store') }}" method="POST" class="space-y-4">
        @csrf
        <input name="name" placeholder="Department Name" class="w-full border rounded px-3 py-2" required>
        <input name="code" placeholder="Department Code" class="w-full border rounded px-3 py-2" required>
        <textarea name="description" placeholder="Description" class="w-full border rounded px-3 py-2"></textarea>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    </form>
</div>
@endsection
