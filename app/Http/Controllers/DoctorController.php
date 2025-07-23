<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   $doctors = Doctor::all();
                $doctors = Doctor::with('courses.department')->get();

    return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('doctors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'specialization' => 'required',
        'email' => 'required|email|unique:doctors',
    ]);
    Doctor::create($request->all());
    return redirect()->route('doctors.index')->with('success','Doctor added successfully');
    }

   
    public function show($id)
    {
        $Doctor=Doctor::with('courses.department')->findOrFail($id);
        return view('Doctor.show',compact('Doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $doctor = Doctor::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')
                         ->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return redirect()->route('doctors.index')
                         ->with('success', 'Doctor deleted successfully.');
        
    }
}
