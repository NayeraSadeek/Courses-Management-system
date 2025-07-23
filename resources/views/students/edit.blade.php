@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Students</h2>

<form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="block text-gray-700 font-medium">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}">
    </div>

    <div class="mb-3">
        <label class="block text-gray-700 font-medium">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
    </div>

    <div class="mb-3">
        <label class="block text-gray-700 font-medium">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
    </div>

    <div class="mb-3">
        <label class="block text-gray-700 font-medium">Birth Date</label>
        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $student->birth_date) }}">
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    <a href="{{ route('students.index') }}"  class="text-gray-600 hover:underline">Cancel</a>
</form>
</div>
@endsection
