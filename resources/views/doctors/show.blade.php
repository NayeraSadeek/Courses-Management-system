<h1 class="text-2xl font-bold mb-4">D/: {{ $teacher->name }}</h1>

<h2 class="text-xl font-semibold mb-2"> Courses:</h2>
<ul class="list-disc list-inside">
    @foreach ($teacher->courses as $course)
        <li>
            {{ $course->title }} (Code: {{ $course->code }})  
            - Department: {{ $course->department ? $course->department->name : 'General ' }}
        </li>
    @endforeach
</ul>
