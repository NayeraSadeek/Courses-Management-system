<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Doctor;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $courses = Course::all();
            $courses = Course::with('doctor')->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $doctors = Doctor::all(); 
    return view('courses.create', compact('doctors'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'credit_hours' => 'required|numeric|min:1',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')->with('success', 'Course added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $doctors=Doctor::all();
                return view('courses.edit', compact('course','doctors'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'credit_hours' => 'required|numeric|min:1',
                    'doctor_id' => 'required|exists:doctors,id', 

        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
         $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }
}
