@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Department</h2>

    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input name="name" value="{{ $department->name }}" class="w-full border rounded px-3 py-2">
        <input name="code" value="{{ $department->code }}" class="w-full border rounded px-3 py-2">
        <textarea name="description" class="w-full border rounded px-3 py-2">{{ $department->description }}</textarea>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
