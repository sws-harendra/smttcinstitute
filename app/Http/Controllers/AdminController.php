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

        return view('admin.dashboard', compact('blogs', 'sliders'));
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
