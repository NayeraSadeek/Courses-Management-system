<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class EnrollController extends Controller
{
    public function index()
    {
        // هات كل الكورسات
        $courses = Course::with('doctor')->get();

        // الطالب الحالي (اللي داخل السيستم)
        $student = Auth::user();

        return view('students.enroll', [
            'courses' => $courses,
            'student' => $student
        ]);
    }

    public function store(Course $course)
    {
        $user = Auth::user();

        // اتأكد إن المستخدم الحالي موجود
        if (!$user) {
            return back()->with('error', 'You must be logged in first.');
        }

        // اتأكد إنه طالب
        if ($user->role !== 'student') {
            return back()->with('error', 'Only students can enroll.');
        }

        // لو الطالب مسجل الكورس قبل كده
        if ($user->courses->contains($course->id)) {
            return back()->with('error', 'You are already enrolled in ' . $course->title);
        }

        // لو كل الشروط تمام.. أضف في الجدول pivot
        $user-> courses()->attach($course->id);

        return back()->with('success', 'Enrolled successfully in ' . $course->title);
    }
}
