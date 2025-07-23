@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-3xl">
    <h2 class="text-2xl font-semibold mb-4">Edit Course</h2>

    <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input name="title" value="{{ $course->title }}" class="w-full border rounded px-3 py-2">
        <input name="code" value="{{ $course->code }}" class="w-full border rounded px-3 py-2">
        <input name="credit_hours" type="number" value="{{ $course->credit_hours }}" class="w-full border rounded px-3 py-2">
         <div>
            <label class="block mb-1 font-medium">Doctor</label>
            <select name="doctor_id" class="w-full border px-3 py-2 rounded" required>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" 
                        {{ $course->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }} ({{ $doctor->specialization }})
                    </option>
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
</div>
@endsection
