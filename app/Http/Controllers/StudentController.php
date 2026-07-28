<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\Certificate;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function loginView()
    {
        if (session()->has('student_logged_in')) {
            return redirect()->route('student.dashboard');
        }
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $student = Admission::where('username', $request->username)->first();

        // Using Hash::check because password was stored using bcrypt in PageController
        if ($student && Hash::check($request->password, $student->password)) {
            session([
                'student_logged_in' => true,
                'student_id' => $student->id,
                'student_name' => $student->name,
                'enrollment_no' => $student->enrollment_no
            ]);
            return redirect()->route('student.dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['error' => 'Invalid username or password']);
    }

    public function dashboard()
    {
        if (!session()->has('student_logged_in')) {
            return redirect()->route('student.login');
        }

        $student = Admission::findOrFail(session('student_id'));
        $certificate = Certificate::where('regd_no', $student->enrollment_no)->first();

        return view('student.dashboard', compact('student', 'certificate'));
    }

    public function logout()
    {
        session()->forget(['student_logged_in', 'student_id', 'student_name', 'enrollment_no']);
        return redirect()->route('student.login')->with('success', 'Logged out successfully');
    }
}
