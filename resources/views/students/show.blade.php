<h1 class="text-2xl font-bold mb-4">Student {{ $user->name }}</h1>

<h2 class="text-xl font-semibold mb-2">Enrolled Courses:</h2>
<ul class="list-disc list-inside">
    @foreach ($user->courses as $course)
        <li>
            {{ $course->title }} ({{ $course->code }}) - No. hours: {{ $course->credit_hours }}
        </li>
    @endforeach
</ul>

<p class="mt-4 font-bold">Total Hours: {{ $totalHours }}</p>
