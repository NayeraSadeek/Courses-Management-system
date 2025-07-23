@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Available Courses</h2>
    @foreach($courses as $course)
        <div class="p-4 mb-3 border rounded">
            <h3 class="font-semibold">{{ $course->title }}</h3>
            <p class="text-gray-500">Credit Hours: {{ $course->credit_hours }}</p>
            <p class="text-gray-500">
                @if($course->doctor)
                    Doctor: {{ $course->doctor->name }}
                @else
                    No doctor assigned
                @endif
            </p>
            <form action="{{ route('enroll.store', $course->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                    Enroll
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
