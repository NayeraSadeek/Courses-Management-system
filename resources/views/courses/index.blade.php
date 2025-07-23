@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Courses</h2>
            <a href="{{ route('courses.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Add Course
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Credit Hours</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Doctor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Enroll</th> <!-- 👈 زرار التسجيل -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->code }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $course->credit_hours }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($course->doctor)
                                    {{ $course->doctor->name }}
                                @else
                                    <span class="text-gray-400 italic">No Doctor Assigned</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Delete this course?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if(auth()->user()->courses->contains($course->id))
                                    <span class="text-green-600 font-semibold">Enrolled ✅</span>
                                @else
                                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                            Enroll
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
