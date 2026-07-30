<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\SliderImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginView()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['admin_logged_in' => true, 'admin_user' => $user->username]);
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }

        // Plain text fallback check for legacy default admin
        if ($user && $user->password === $request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
            session(['admin_logged_in' => true, 'admin_user' => $user->username]);
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['error' => 'Invalid username or password']);
    }

    public function dashboard()
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $blogs = Blog::latest()->get();
        $sliders = SliderImage::latest()->get();
        $fees = \App\Models\FeeStructure::all();
        $galleries = \App\Models\GalleryImage::latest()->get();
        $certificates = \App\Models\Certificate::latest()->get();
        $admissions = \App\Models\Admission::latest()->get();

        return view('admin.dashboard', compact('blogs', 'sliders', 'fees', 'galleries', 'certificates', 'admissions'));
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

    // Web CRUD actions
    public function storeBlog(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $imageUrl,
        ]);

        return back()->with('blog_success', 'Blog published successfully!');
    }

    public function updateBlog(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $blog->image_url = '/uploads/' . $filename;
        }

        $blog->save();

        return back()->with('blog_success', 'Blog article updated successfully!');
    }

    public function deleteBlog($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $blog = Blog::findOrFail($id);
        $blog->delete();

        return back()->with('blog_success', 'Blog deleted successfully');
    }

    public function storeSlider(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;

            SliderImage::create(['image_url' => $imageUrl]);

            return back()->with('slider_success', 'Slider image uploaded successfully!');
        }

        return back()->withErrors(['slider_error' => 'Image file is required']);
    }

    public function deleteSlider($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $slider = SliderImage::findOrFail($id);
        $slider->delete();

        return back()->with('slider_success', 'Slider image deleted successfully');
    }

    public function storeFee(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'course_name' => 'required|string',
            'duration' => 'required|string',
            'course_fee' => 'required|string',
            'certification' => 'nullable|string',
        ]);

        \App\Models\FeeStructure::create([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'course_fee' => $request->course_fee,
            'certification' => $request->certification ?? 'Yes',
        ]);

        return back()->with('fee_success', 'Fee structure added successfully!');
    }

    public function deleteFee($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $fee = \App\Models\FeeStructure::findOrFail($id);
        $fee->delete();

        return back()->with('fee_success', 'Fee structure deleted successfully');
    }

    public function storeGallery(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-gal-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;

            \App\Models\GalleryImage::create(['image_url' => $imageUrl]);

            return back()->with('gallery_success', 'Gallery image uploaded successfully!');
        }

        return back()->withErrors(['gallery_error' => 'Image file is required']);
    }

    public function deleteGallery($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $gallery = \App\Models\GalleryImage::findOrFail($id);
        $gallery->delete();

        return back()->with('gallery_success', 'Gallery image deleted successfully');
    }

    public function storeCertificate(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'regd_no' => 'required|unique:certificates',
            'sl_no' => 'required|unique:certificates',
            'name' => 'required',
            'father_name' => 'required',
            'course' => 'required',
            'center' => 'required',
            'location' => 'required',
        ]);

        \App\Models\Certificate::create($request->all());

        return back()->with('cert_success', 'Certificate generated successfully!');
    }

    public function deleteCertificate($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $cert = \App\Models\Certificate::findOrFail($id);
        $cert->delete();

        return back()->with('cert_success', 'Certificate deleted successfully');
    }

    public function storeCertSignatures(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        if ($request->hasFile('incharge_sig')) {
            $file = $request->file('incharge_sig');
            $filename = 'incharge_sig_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            \App\Models\Setting::updateOrCreate(
                ['key' => 'cert_incharge_signature'],
                ['value' => '/uploads/' . $filename]
            );
        }

        if ($request->hasFile('auth_sig')) {
            $file = $request->file('auth_sig');
            $filename = 'auth_sig_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            \App\Models\Setting::updateOrCreate(
                ['key' => 'cert_signature'],
                ['value' => '/uploads/' . $filename]
            );
        }

        return back()->with('cert_success', 'Signatures updated successfully!');
    }

    public function approveAdmissionCertificate($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $admission = \App\Models\Admission::findOrFail($id);

        // Check if certificate already exists
        $exists = \App\Models\Certificate::where('regd_no', $admission->enrollment_no)->exists();
        if ($exists) {
            return back()->with('cert_success', 'Certificate already generated for this student.');
        }

        // Auto-generate serial number
        $latestCert = \App\Models\Certificate::latest()->first();
        $sl_no = 'SMTTC-CERT-' . date('Y') . '-' . str_pad(($latestCert ? $latestCert->id + 1 : 1), 4, '0', STR_PAD_LEFT);

        \App\Models\Certificate::create([
            'regd_no' => $admission->enrollment_no,
            'sl_no' => $sl_no,
            'name' => $admission->name,
            'father_name' => $admission->father_name,
            'dob' => $admission->dob,
            'course' => $admission->course,
            'from_date' => $admission->session_start,
            'to_date' => \Carbon\Carbon::parse($admission->session_start)->addMonths(3)->format('Y-m-d'), // Defaulting to 3 months for now, can be adjusted
            'center' => $admission->center,
            'location' => $admission->district . ', ' . $admission->state,
            'issued_date' => now()->format('Y-m-d'),
        ]);

        return back()->with('cert_success', 'Certificate generated successfully for ' . $admission->name . '!');
    }

    // API Login for legacy JS calls
    public function apiLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && (Hash::check($password, $user->password) || $user->password === $password)) {
            return response()->json([
                'token' => 'admin-authenticated-token-smttc',
                'message' => 'Login successful'
            ]);
        }

        return response()->json(['error' => 'Invalid username or password'], 401);
    }
}
