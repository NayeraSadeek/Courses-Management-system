<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   $students = Student::all();
               $students = Student::with('courses')->get();

    return view('students.index', compact('students'));

       /* $user = Auth::user();

    // Make sure only students see this
    if ($user->role !== 'student') {
        abort(403, 'Only students can view this page');
    }
      $enrolledCourses = $user->courses;

    // Calculate total hours
    $totalHours = $enrolledCourses->sum('credit_hours');

    return view('students.index', [
        'user' => $user,
        'courses' => $enrolledCourses,
        'totalHours' => $totalHours,
    ]);
        // return view('students.index', compact('students'));*/

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date',
        ]);

        // Student::create($request->all());
         Student::create([
        'user_id' => Auth::id(), // or another user's id
        'name'    => $request->input('name'),
        'email'   => $request->input('email'),
        'phone'   => $request->input('phone'),
        'birth_date' => $request->input('birth_date'),
    ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $student = User::where('id', $id)
                   ->where('role', 'student')
                   ->with('courses') // eager load courses
                   ->firstOrFail();

    // Calculate total hours
    $totalHours = $student->courses->sum('credit_hours');

    // Pass both variables to the view
    return view('students.show', [
        'student' => $student,
        'totalHours' => $totalHours,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
                return view('students.edit', compact('student'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
         $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
