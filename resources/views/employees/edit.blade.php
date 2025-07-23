@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Employee</h2>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input name="name" value="{{ $employee->name }}" class="w-full border rounded px-3 py-2">
        <input name="position" value="{{ $employee->position }}" class="w-full border rounded px-3 py-2">
        <input name="email" type="email" value="{{ $employee->email }}" class="w-full border rounded px-3 py-2">
        <input name="phone" value="{{ $employee->phone }}" class="w-full border rounded px-3 py-2">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
