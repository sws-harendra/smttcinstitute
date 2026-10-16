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
        $beforeAfters = \App\Models\BeforeAfterRepair::orderBy('order_num', 'asc')->latest()->get();
        $successfulStudents = \App\Models\SuccessfulStudent::orderBy('order_num', 'asc')->latest()->get();
        $successVideos = \App\Models\SuccessStoryVideo::orderBy('order_num', 'asc')->latest()->get();
        return view('gallery', compact('galleries', 'beforeAfters', 'successfulStudents', 'successVideos'));
    }

    public function likeBeforeAfter($id)
    {
        $item = \App\Models\BeforeAfterRepair::findOrFail($id);
        $item->increment('likes_count');
        return response()->json([
            'success' => true,
            'likes' => $item->likes_count
        ]);
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
            'Smartphone & iPhone Chip-Level Repairing',
            'Laptop Motherboard & MacBook Repairing',
            'AC Repairing & Inverter PCB Course',
            'Washing Machine Repairing (Semi & Fully Auto)',
            'Refrigerator & Inverter Fridge Repairing',
            'LED TV & Smart Android TV Repairing',
            'Mobile Phone Repairing',
            'Laptop Repairing',
            'AC Repairing',
            'Fridge Repairing',
            'Washing Machine Repairing',
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

        $admission = \App\Models\Admission::create($validated);

        // Auto-generate official Certificate for the student
        try {
            $latestCert = \App\Models\Certificate::orderBy('id', 'desc')->first();
            $nextCertId = $latestCert ? ($latestCert->id + 1) : 1;
            $sl_no = 'SMTTC-CERT-' . date('Y') . '-' . str_pad($nextCertId, 4, '0', STR_PAD_LEFT);

            // While sl_no exists, increment to guarantee uniqueness
            while (\App\Models\Certificate::where('sl_no', $sl_no)->exists()) {
                $nextCertId++;
                $sl_no = 'SMTTC-CERT-' . date('Y') . '-' . str_pad($nextCertId, 4, '0', STR_PAD_LEFT);
            }

            $sessionDate = !empty($validated['session_start']) ? $validated['session_start'] : now()->format('Y-m-d');
            $toDate = \Carbon\Carbon::parse($sessionDate)->addMonths(3)->format('Y-m-d');

            \App\Models\Certificate::create([
                'regd_no' => $validated['enrollment_no'],
                'sl_no' => $sl_no,
                'name' => $validated['name'],
                'photo' => $validated['photo'] ?? null,
                'father_name' => $validated['father_name'],
                'dob' => $validated['dob'] ?? null,
                'course' => $validated['course'],
                'from_date' => $sessionDate,
                'to_date' => $toDate,
                'center' => $validated['center'] ?? 'SMTTC Institute',
                'location' => ($validated['district'] ?? 'Patna') . ', ' . ($validated['state'] ?? 'Bihar'),
                'issued_date' => now()->format('Y-m-d'),
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Auto Certificate Generation Error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Admission form submitted successfully! Your Enrollment No: ' . $validated['enrollment_no'] . ' and official student certificate have been created.');
    }
}
