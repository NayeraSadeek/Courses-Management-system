@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Add Course</h2>

    <form action="{{ route('courses.store') }}" method="POST" class="space-y-4">
        @csrf
        <input name="title" placeholder="Course Title" class="w-full border rounded px-3 py-2" required>
        <input name="code" placeholder="Course Code" class="w-full border rounded px-3 py-2" required>
        <input name="credit_hours" type="number" placeholder="Credit Hours" class="w-full border rounded px-3 py-2" required>
         <div>
            <label class="block mb-1 font-medium"> Doctor:</label>
            <select name="doctor_id" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- choose Doctor--</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialization }})</option>
                @endforeach
            </select>
        </div>
        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    </form>
</div>
@endsection
