@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Add Student</h2>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
        @csrf
        <input name="name" placeholder="Name" class="w-full border rounded px-3 py-2" required>
        <input name="email" type="email" placeholder="Email" class="w-full border rounded px-3 py-2" required>
        <input name="phone" placeholder="Phone" class="w-full border rounded px-3 py-2" required>
        <input name="birth_date" type="date" class="w-full border rounded px-3 py-2" required>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    </form>
</div>
@endsection
