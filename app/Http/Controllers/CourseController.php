<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function acRepairing()
    {
        return view('courses.acreparing');
    }

    public function washingMachine()
    {
        return view('courses.washingmachine');
    }

    public function fridgeRepairing()
    {
        return view('courses.fridgereparing');
    }

    public function mobileRepairing()
    {
        return view('courses.mobilereparing');
    }

    public function laptopRepairing()
    {
        return view('courses.laptoprepairing');
    }
}
