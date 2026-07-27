<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('aboutus');
    }

    public function contact()
    {
        return view('contact');
    }

    public function gallery()
    {
        $galleries = \App\Models\GalleryImage::latest()->get();
        return view('gallery', compact('galleries'));
    }

    public function feestructure()
    {
        $fees = \App\Models\FeeStructure::all();
        return view('feestructure', compact('fees'));
    }

    public function sitemap()
    {
        return view('sitemap');
    }

    public function admissionForm()
    {
        $states = ['Bihar', 'Jharkhand', 'Uttar Pradesh'];
        $stateDistricts = [
            'Bihar' => ['Patna', 'Gaya', 'Muzaffarpur', 'Bhagalpur'],
            'Jharkhand' => ['Ranchi', 'Dhanbad', 'Jamshedpur'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur', 'Varanasi']
        ];
        $districtCenters = [
            'Patna' => ['SMTTC Patna Main Branch', 'SMTTC Boring Road'],
            'Gaya' => ['SMTTC Gaya Center'],
            'Muzaffarpur' => ['SMTTC Muzaffarpur'],
            'Bhagalpur' => ['SMTTC Bhagalpur'],
            'Ranchi' => ['SMTTC Ranchi Center'],
            'Dhanbad' => ['SMTTC Dhanbad'],
            'Jamshedpur' => ['SMTTC Jamshedpur'],
            'Lucknow' => ['SMTTC Lucknow'],
            'Kanpur' => ['SMTTC Kanpur'],
            'Varanasi' => ['SMTTC Varanasi']
        ];
        $courses = [
            'AC Repairing',
            'Washing Machine Repairing',
            'Fridge Repairing',
            'Mobile Repairing',
            'Laptop Repairing'
        ];

        $latestAdmission = \App\Models\Admission::latest()->first();
        $nextEnrollment = $latestAdmission ? 'SMTTC' . str_pad($latestAdmission->id + 1, 4, '0', STR_PAD_LEFT) : 'SMTTC0001';

        return view('admission', compact('states', 'stateDistricts', 'districtCenters', 'courses', 'nextEnrollment'));
    }

    public function storeAdmission(Request $request)
    {
        $validated = $request->validate([
            'state' => 'required',
            'district' => 'required',
            'center' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required|date',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'username' => 'required|unique:admissions,username',
            'password' => 'required',
            'course' => 'required',
            'photo' => 'required|image|max:2048',
            'session_start' => 'required|date',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/admissions'), $filename);
            $validated['photo'] = 'uploads/admissions/' . $filename;
        }

        $validated['password'] = bcrypt($validated['password']);
        
        $latestAdmission = \App\Models\Admission::latest()->first();
        $validated['enrollment_no'] = $latestAdmission ? 'SMTTC' . str_pad($latestAdmission->id + 1, 4, '0', STR_PAD_LEFT) : 'SMTTC0001';

        $validated['exam_pass'] = $request->exam_pass;
        $validated['pass_year'] = $request->pass_year;
        $validated['marks_grade'] = $request->marks_grade;
        $validated['board'] = $request->board;

        \App\Models\Admission::create($validated);

        return redirect()->back()->with('success', 'Admission form submitted successfully! Your Enrollment No is: ' . $validated['enrollment_no']);
    }
}
