@extends('layouts.app')

@section('content')

<div class="bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Students</h2>
        <a href="{{ route('students.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Student
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Birth Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Enrolled Courses</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Hours</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-bold">{{ $student->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $student->birth_date }}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($student->courses->count())
                                <ul class="list-disc list-inside">
                                    @foreach($student->courses as $course)
                                        <li>
                                            {{ $course->title }}
                                            <span class="text-sm text-gray-500">
                                                ({{ $course->credit_hours }}h)
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-gray-400 italic">No courses enrolled</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap font-semibold">
                            {{ $student->courses->sum('credit_hours') }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                            <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
