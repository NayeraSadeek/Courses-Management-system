@extends('layouts.app')
@section('content')

  <div class="bg-white shadow rounded-lg p-6 ">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Doctors</h2>
            <a href="{{ route('doctors.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
               Add Doctor
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialization</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Courses Teaching</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold">{{ $doctor->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->specialization }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $doctor->email }}</td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($doctor->courses->count() > 0)
                                    <ul class="list-disc list-inside">
                                        @foreach($doctor->courses as $course)
                                            <li>
                                                {{ $course->title }}
                                                @if($course->department)
                                                    <span class="text-gray-500 text-sm">
                                                        (قسم: {{ $course->department->name }})
                                                    </span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-gray-400 italic">No courses assigned</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this doctor?');">
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
