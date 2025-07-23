<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Student;
use App\Models\Doctor;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

     $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:'.User::class,
    'password' => 'required|string|confirmed|min:8',
    'role' => 'required|in:student,doctor',
    'specialization' => 'required_if:role,doctor|string|max:255', 

]);
       

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('password'),
            'role' =>$request->input('role'),

        ]);

if ($request->input('role') === 'student') {
        Student::create([
            'user_id' => $user->id,
            'name'    => $user->name,   
            'email'   => $user->email, 

]);
    } else if ($request->input('role') === 'doctor') {
        Doctor::create([
            'user_id' => $user->id,
             'name'    => $user->name,   
        'email'   => $user->email,
        'specialization'=>$request->input('specialization'),
        ]);
    }


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
