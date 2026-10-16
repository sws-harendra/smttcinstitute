<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\SliderImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $beforeAfters = \App\Models\BeforeAfterRepair::latest()->get();
        $successfulStudents = \App\Models\SuccessfulStudent::orderBy('order_num', 'asc')->latest()->get();
        $successVideos = \App\Models\SuccessStoryVideo::orderBy('order_num', 'asc')->latest()->get();

        return view('admin.dashboard', compact('blogs', 'sliders', 'fees', 'galleries', 'certificates', 'admissions', 'beforeAfters', 'successfulStudents', 'successVideos'));
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

    public function uploadImage(Request $request)
    {
        if (!session()->has('admin_logged_in') && $request->header('Authorization') !== 'Bearer admin-authenticated-token-smttc') {
            return response()->json(['error' => 'Unauthorized. Please login again.'], 401);
        }

        $file = $request->file('image') ?? $request->file('file') ?? $request->file('upload');

        if ($file) {
            $ext = $file->getClientOriginalExtension() ?: 'png';
            $filename = time() . '-' . uniqid() . '.' . $ext;
            $uploadsDir = public_path('uploads');
            if (!file_exists($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }
            $file->move($uploadsDir, $filename);
            $fullUrl = $request->getSchemeAndHttpHost() . '/uploads/' . $filename;
            $relativeUrl = '/uploads/' . $filename;
            return response()->json([
                'url' => $fullUrl,
                'location' => $fullUrl,
                'relative_url' => $relativeUrl
            ]);
        }

        if ($request->filled('base64')) {
            $base64Data = $request->input('base64');
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $data = substr($base64Data, strpos($base64Data, ',') + 1);
                $ext = strtolower($type[1]);
                if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $ext = 'png';
                }
                $data = base64_decode($data);
                if ($data !== false) {
                    $filename = time() . '-' . uniqid() . '.' . $ext;
                    $uploadsDir = public_path('uploads');
                    if (!file_exists($uploadsDir)) {
                        mkdir($uploadsDir, 0777, true);
                    }
                    file_put_contents($uploadsDir . DIRECTORY_SEPARATOR . $filename, $data);
                    $fullUrl = $request->getSchemeAndHttpHost() . '/uploads/' . $filename;
                    $relativeUrl = '/uploads/' . $filename;
                    return response()->json([
                        'url' => $fullUrl,
                        'location' => $fullUrl,
                        'relative_url' => $relativeUrl
                    ]);
                }
            }
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }

    // Web CRUD actions
    public function storeBlog(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Aapka admin session expire ho gaya hai, kripya dobara login karein.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,avif,svg,bmp|max:10240',
            'cover_link' => 'nullable|string|max:1000',
            'title_color' => 'nullable|string|max:50',
            'title_font' => 'nullable|string|max:50',
            'title_size' => 'nullable|string|max:50',
            'title_weight' => 'nullable|string|max:50',
            'title_transform' => 'nullable|string|max:50',
            'author_name' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Blog Title enter karna zaroori hai.',
            'content.required' => 'Blog Content enter karna zaroori hai.',
            'image.mimes' => 'Cover image format invalid hai (Sirf JPG, PNG, WEBP, GIF, AVIF supported hai).',
            'image.max' => 'Cover image size bohot bada hai (Maximum 10MB allowed).',
        ]);

        if ($validator->fails()) {
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->withErrors($validator)
                ->withInput()
                ->with('blog_error', $validator->errors()->first());
        }

        try {
            // Auto-deduplicate slug so blog creation NEVER fails on duplicate title/slug
            $rawSlug = $request->slug ? trim($request->slug) : trim($request->title);
            $baseSlug = Str::slug($rawSlug) ?: 'blog-' . time();
            $slug = $baseSlug;
            $counter = 1;
            while (Blog::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $imageUrl = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . uniqid() . '.' . ($file->getClientOriginalExtension() ?: 'webp');
                $uploadsDir = public_path('uploads');
                if (!file_exists($uploadsDir)) {
                    mkdir($uploadsDir, 0777, true);
                }
                $file->move($uploadsDir, $filename);
                $imageUrl = '/uploads/' . $filename;
            }

            $coverLink = $request->cover_link ? trim($request->cover_link) : null;
            if ($coverLink && !preg_match("~^(?:f|ht)tps?://~i", $coverLink) && !str_starts_with($coverLink, '/') && !str_starts_with($coverLink, '#')) {
                $coverLink = 'https://' . $coverLink;
            }

            // Extract and save any inline base64 images to prevent bloat & payload limits
            $processedContent = $this->extractAndSaveBase64Images($request->content);
            // Sanitize content and hoist floated images to the top of paragraph so text wraps cleanly from line 1
            $processedContent = $this->sanitizeAndHoistBlogContent($processedContent);

            Blog::create([
                'title' => $request->title,
                'slug' => $slug,
                'content' => $processedContent,
                'image_url' => $imageUrl,
                'cover_link' => $coverLink,
                'title_color' => $request->title_color ?: null,
                'title_font' => $request->title_font ?: null,
                'title_size' => $request->title_size ?: null,
                'title_weight' => $request->title_weight ?: null,
                'title_transform' => $request->title_transform ?: null,
                'author_name' => $request->author_name,
            ]);

            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->with('blog_success', 'Blog article successfully publish ho gaya!');
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Blog store failed: ' . $e->getMessage());
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->withInput()
                ->with('blog_error', 'Blog post karne me error aaya: ' . $e->getMessage());
        }
    }

    public function updateBlog(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Aapka admin session expire ho gaya hai, kripya dobara login karein.');
        }

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,webp,gif,avif,svg,bmp|max:10240',
            'cover_link' => 'nullable|string|max:1000',
            'title_color' => 'nullable|string|max:50',
            'title_font' => 'nullable|string|max:50',
            'title_size' => 'nullable|string|max:50',
            'title_weight' => 'nullable|string|max:50',
            'title_transform' => 'nullable|string|max:50',
            'author_name' => 'nullable|string|max:255',
        ], [
            'title.required' => 'Blog Title enter karna zaroori hai.',
            'content.required' => 'Blog Content enter karna zaroori hai.',
            'image.mimes' => 'Cover image format invalid hai (Sirf JPG, PNG, WEBP, GIF, AVIF supported hai).',
            'image.max' => 'Cover image size bohot bada hai (Maximum 10MB allowed).',
        ]);

        if ($validator->fails()) {
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->withErrors($validator)
                ->withInput()
                ->with('blog_error', $validator->errors()->first());
        }

        try {
            $blog = Blog::findOrFail($id);

            // Auto-deduplicate slug excluding current blog
            $rawSlug = $request->slug ? trim($request->slug) : trim($request->title);
            $baseSlug = Str::slug($rawSlug) ?: 'blog-' . time();
            $slug = $baseSlug;
            $counter = 1;
            while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $blog->title = $request->title;
            $blog->slug = $slug;
            $cleanContent = $this->extractAndSaveBase64Images($request->content);
            $blog->content = $this->sanitizeAndHoistBlogContent($cleanContent);
            $blog->author_name = $request->author_name;
            $blog->title_color = $request->title_color ?: null;
            $blog->title_font = $request->title_font ?: null;
            $blog->title_size = $request->title_size ?: null;
            $blog->title_weight = $request->title_weight ?: null;
            $blog->title_transform = $request->title_transform ?: null;

            $coverLink = $request->cover_link ? trim($request->cover_link) : null;
            if ($coverLink && !preg_match("~^(?:f|ht)tps?://~i", $coverLink) && !str_starts_with($coverLink, '/') && !str_starts_with($coverLink, '#')) {
                $coverLink = 'https://' . $coverLink;
            }
            $blog->cover_link = $coverLink;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '-' . uniqid() . '.' . ($file->getClientOriginalExtension() ?: 'webp');
                $uploadsDir = public_path('uploads');
                if (!file_exists($uploadsDir)) {
                    mkdir($uploadsDir, 0777, true);
                }
                $file->move($uploadsDir, $filename);
                $blog->image_url = '/uploads/' . $filename;
            }

            $blog->save();

            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->with('blog_success', 'Blog article successfully update ho gaya!');
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Blog update failed: ' . $e->getMessage());
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->withInput()
                ->with('blog_error', 'Blog update karne me error aaya: ' . $e->getMessage());
        }
    }

    public function deleteBlog($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->with('blog_success', 'Blog article delete ho gaya!');
        } catch (\Throwable $e) {
            return redirect()->to(route('admin.dashboard') . '#blogs')
                ->with('blog_error', 'Blog delete karne me error aaya: ' . $e->getMessage());
        }
    }

    /**
     * Helper to extract any inline base64 images from TinyMCE and save to disk
     */
    protected function extractAndSaveBase64Images($content)
    {
        if (empty($content) || !str_contains($content, 'data:image/')) {
            return $content;
        }

        $uploadsDir = public_path('uploads');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        return preg_replace_callback('/data:image\/([a-zA-Z0-9\+\-]+);base64,([a-zA-Z0-9\/\r\n+]+={0,2})/', function ($matches) use ($uploadsDir) {
            $ext = strtolower($matches[1]);
            if (!in_array($ext, ['png', 'jpg', 'jpeg', 'webp', 'gif', 'svg+xml', 'svg'])) {
                $ext = 'png';
            }
            if ($ext === 'svg+xml') {
                $ext = 'svg';
            }

            $data = base64_decode($matches[2]);
            if ($data !== false) {
                $filename = 'inline-' . time() . '-' . uniqid() . '.' . $ext;
                file_put_contents($uploadsDir . DIRECTORY_SEPARATOR . $filename, $data);
                return '/uploads/' . $filename;
            }

            return $matches[0];
        }, $content);
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
            'course_name' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'course_fee' => 'required|string|max:100',
            'certification' => 'nullable|string|max:100',
            'discount_boys' => 'nullable|integer|min:0|max:100',
            'discount_girls' => 'nullable|integer|min:0|max:100',
            'boys_fee' => 'nullable|string|max:100',
            'girls_fee' => 'nullable|string|max:100',
            'offer_tag' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:50',
            'course_slug' => 'nullable|string|max:100',
        ]);

        \App\Models\FeeStructure::create([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'course_fee' => $request->course_fee,
            'certification' => $request->certification ?? 'Yes',
            'discount_boys' => $request->discount_boys !== null && $request->discount_boys !== '' ? (int)$request->discount_boys : null,
            'discount_girls' => $request->discount_girls !== null && $request->discount_girls !== '' ? (int)$request->discount_girls : null,
            'boys_fee' => $request->boys_fee ?: null,
            'girls_fee' => $request->girls_fee ?: null,
            'offer_tag' => $request->offer_tag ?: null,
            'offer_active' => $request->has('offer_active') ? (bool)$request->offer_active : true,
            'badge_color' => $request->badge_color ?: 'emerald',
            'course_slug' => $request->course_slug ?: null,
        ]);

        return redirect()->to(route('admin.dashboard') . '#fees')
            ->with('fee_success', 'Course Fee & Discount structure successfully add ho gaya!');
    }

    public function updateFee(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'course_name' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'course_fee' => 'required|string|max:100',
            'certification' => 'nullable|string|max:100',
            'discount_boys' => 'nullable|integer|min:0|max:100',
            'discount_girls' => 'nullable|integer|min:0|max:100',
            'boys_fee' => 'nullable|string|max:100',
            'girls_fee' => 'nullable|string|max:100',
            'offer_tag' => 'nullable|string|max:100',
            'badge_color' => 'nullable|string|max:50',
            'course_slug' => 'nullable|string|max:100',
        ]);

        $fee = \App\Models\FeeStructure::findOrFail($id);
        $fee->update([
            'course_name' => $request->course_name,
            'duration' => $request->duration,
            'course_fee' => $request->course_fee,
            'certification' => $request->certification ?? 'Yes',
            'discount_boys' => $request->discount_boys !== null && $request->discount_boys !== '' ? (int)$request->discount_boys : null,
            'discount_girls' => $request->discount_girls !== null && $request->discount_girls !== '' ? (int)$request->discount_girls : null,
            'boys_fee' => $request->boys_fee ?: null,
            'girls_fee' => $request->girls_fee ?: null,
            'offer_tag' => $request->offer_tag ?: null,
            'offer_active' => $request->has('offer_active') ? (bool)$request->offer_active : false,
            'badge_color' => $request->badge_color ?: 'emerald',
            'course_slug' => $request->course_slug ?: null,
        ]);

        return redirect()->to(route('admin.dashboard') . '#fees')
            ->with('fee_success', 'Course Fee & Discount successfully update ho gaya!');
    }

    public function deleteFee($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $fee = \App\Models\FeeStructure::findOrFail($id);
        $fee->delete();

        return redirect()->to(route('admin.dashboard') . '#fees')
            ->with('fee_success', 'Fee structure deleted successfully');
    }

    public function storeGallery(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'media_type' => 'required|in:image,video',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'video_file' => 'nullable|mimes:mp4,webm,mov,ogg|max:51200',
            'video_url' => 'nullable|string|max:1000',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $mediaType = $request->input('media_type', 'image');
        $title = $request->input('title');
        $description = $request->input('description');
        $category = $request->input('category', 'General') ?: 'General';
        $imageUrl = null;
        $videoUrl = null;
        $thumbnailUrl = null;

        $uploadsDir = public_path('uploads');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        if ($mediaType === 'image') {
            if (!$request->hasFile('image')) {
                return back()->withErrors(['gallery_error' => 'Please select an image file to upload.']);
            }
            $file = $request->file('image');
            $filename = time() . '-gal-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadsDir, $filename);
            $imageUrl = '/uploads/' . $filename;
        } else {
            // Video handling: file or URL
            if ($request->hasFile('video_file')) {
                $file = $request->file('video_file');
                $filename = time() . '-gal-vid-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move($uploadsDir, $filename);
                $videoUrl = '/uploads/' . $filename;
            } elseif ($request->filled('video_url')) {
                $videoUrl = trim($request->input('video_url'));
            } else {
                return back()->withErrors(['gallery_error' => 'Please upload a video file or provide a video URL (YouTube, Vimeo, etc.).']);
            }

            // Thumbnail for video
            if ($request->hasFile('thumbnail')) {
                $thumbFile = $request->file('thumbnail');
                $thumbName = time() . '-thumb-' . uniqid() . '.' . $thumbFile->getClientOriginalExtension();
                $thumbFile->move($uploadsDir, $thumbName);
                $thumbnailUrl = '/uploads/' . $thumbName;
                $imageUrl = $thumbnailUrl;
            } elseif ($videoUrl && preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches)) {
                $thumbnailUrl = "https://img.youtube.com/vi/{$matches[1]}/hqdefault.jpg";
                $imageUrl = $thumbnailUrl;
            } else {
                $imageUrl = '/assets/images/g1.webp';
            }
        }

        \App\Models\GalleryImage::create([
            'title' => $title,
            'description' => $description,
            'category' => $category,
            'media_type' => $mediaType,
            'image_url' => $imageUrl,
            'video_url' => $videoUrl,
            'thumbnail_url' => $thumbnailUrl,
        ]);

        return back()->with('gallery_success', 'Gallery item (' . ($mediaType === 'video' ? 'Video' : 'Photo') . ') added successfully!');
    }

    public function updateGallery(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $gallery = \App\Models\GalleryImage::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'video_url' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $gallery->title = $request->input('title');
        $gallery->description = $request->input('description');
        if ($request->filled('category')) {
            $gallery->category = $request->input('category');
        }

        $uploadsDir = public_path('uploads');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-gal-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadsDir, $filename);
            $gallery->image_url = '/uploads/' . $filename;
        }

        if ($gallery->media_type === 'video') {
            if ($request->filled('video_url')) {
                $gallery->video_url = trim($request->input('video_url'));
            }
            if ($request->hasFile('thumbnail')) {
                $thumbFile = $request->file('thumbnail');
                $thumbName = time() . '-thumb-' . uniqid() . '.' . $thumbFile->getClientOriginalExtension();
                $thumbFile->move($uploadsDir, $thumbName);
                $gallery->thumbnail_url = '/uploads/' . $thumbName;
                $gallery->image_url = $gallery->thumbnail_url;
            } elseif ($gallery->video_url && preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $gallery->video_url, $matches)) {
                if (!$gallery->thumbnail_url) {
                    $gallery->thumbnail_url = "https://img.youtube.com/vi/{$matches[1]}/hqdefault.jpg";
                    $gallery->image_url = $gallery->thumbnail_url;
                }
            }
        }

        $gallery->save();

        return back()->with('gallery_success', 'Gallery item updated successfully!');
    }

    public function deleteGallery($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $gallery = \App\Models\GalleryImage::findOrFail($id);

        if ($gallery->image_url && str_starts_with($gallery->image_url, '/uploads/')) {
            $path = public_path(ltrim($gallery->image_url, '/'));
            if (file_exists($path)) {
                @unlink($path);
            }
        }
        if ($gallery->video_url && str_starts_with($gallery->video_url, '/uploads/')) {
            $vPath = public_path(ltrim($gallery->video_url, '/'));
            if (file_exists($vPath)) {
                @unlink($vPath);
            }
        }

        $gallery->delete();

        return back()->with('gallery_success', 'Gallery item deleted successfully');
    }

    public function storeBeforeAfter(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'before_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'after_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'before_label' => 'nullable|string|max:100',
            'after_label' => 'nullable|string|max:100',
            'fault_description' => 'nullable|string',
            'repair_solution' => 'nullable|string',
            'tools_used' => 'nullable|string|max:255',
        ]);

        $uploadsDir = public_path('uploads/before_after');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $beforeFile = $request->file('before_image');
        $beforeName = time() . '-before-' . uniqid() . '.' . $beforeFile->getClientOriginalExtension();
        $beforeFile->move($uploadsDir, $beforeName);

        $afterFile = $request->file('after_image');
        $afterName = time() . '-after-' . uniqid() . '.' . $afterFile->getClientOriginalExtension();
        $afterFile->move($uploadsDir, $afterName);

        \App\Models\BeforeAfterRepair::create([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'before_image' => 'uploads/before_after/' . $beforeName,
            'after_image' => 'uploads/before_after/' . $afterName,
            'before_label' => $request->input('before_label') ?: 'Before (Faulty / Dead)',
            'after_label' => $request->input('after_label') ?: 'After (100% Fixed & Tested)',
            'fault_description' => $request->input('fault_description'),
            'repair_solution' => $request->input('repair_solution'),
            'tools_used' => $request->input('tools_used'),
            'likes_count' => rand(15, 45)
        ]);

        return back()->with('gallery_success', 'Before & After repair case study added successfully!');
    }

    public function updateBeforeAfter(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $item = \App\Models\BeforeAfterRepair::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'before_label' => 'nullable|string|max:100',
            'after_label' => 'nullable|string|max:100',
            'fault_description' => 'nullable|string',
            'repair_solution' => 'nullable|string',
            'tools_used' => 'nullable|string|max:255',
        ]);

        $item->title = $request->input('title');
        $item->category = $request->input('category');
        $item->before_label = $request->input('before_label') ?: 'Before (Faulty / Dead)';
        $item->after_label = $request->input('after_label') ?: 'After (100% Fixed & Tested)';
        $item->fault_description = $request->input('fault_description');
        $item->repair_solution = $request->input('repair_solution');
        $item->tools_used = $request->input('tools_used');

        $uploadsDir = public_path('uploads/before_after');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        if ($request->hasFile('before_image')) {
            $beforeFile = $request->file('before_image');
            $beforeName = time() . '-before-' . uniqid() . '.' . $beforeFile->getClientOriginalExtension();
            $beforeFile->move($uploadsDir, $beforeName);
            $item->before_image = 'uploads/before_after/' . $beforeName;
        }

        if ($request->hasFile('after_image')) {
            $afterFile = $request->file('after_image');
            $afterName = time() . '-after-' . uniqid() . '.' . $afterFile->getClientOriginalExtension();
            $afterFile->move($uploadsDir, $afterName);
            $item->after_image = 'uploads/before_after/' . $afterName;
        }

        $item->save();

        return back()->with('gallery_success', 'Before & After repair case study updated successfully!');
    }

    public function deleteBeforeAfter($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $item = \App\Models\BeforeAfterRepair::findOrFail($id);

        if ($item->before_image && str_starts_with($item->before_image, 'uploads/')) {
            $path = public_path($item->before_image);
            if (file_exists($path)) @unlink($path);
        }
        if ($item->after_image && str_starts_with($item->after_image, 'uploads/')) {
            $path = public_path($item->after_image);
            if (file_exists($path)) @unlink($path);
        }

        $item->delete();

        return back()->with('gallery_success', 'Before & After repair case study removed successfully!');
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = time() . '-cert-' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('uploads/students'), $photoName);
            $data['photo'] = '/uploads/students/' . $photoName;
        }

        \App\Models\Certificate::create($data);

        return back()->with('cert_success', 'Certificate generated successfully!');
    }

    public function updateCertificate(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $cert = \App\Models\Certificate::findOrFail($id);

        $validated = $request->validate([
            'regd_no' => 'required',
            'sl_no' => 'required|unique:certificates,sl_no,' . $cert->id,
            'name' => 'required|string',
            'father_name' => 'required|string',
            'dob' => 'nullable|date',
            'course' => 'required|string',
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'center' => 'required|string',
            'location' => 'required|string',
            'issued_date' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoName = time() . '-cert-' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move(public_path('uploads/students'), $photoName);
            $validated['photo'] = '/uploads/students/' . $photoName;
        }

        $cert->update($validated);

        return back()->with('cert_success', 'Certificate for ' . $cert->name . ' updated successfully!');
    }

    public function uploadIdCardPhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $photoFile = $request->file('photo');
        $photoName = time() . '-idcard-' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
        $photoFile->move(public_path('uploads/students'), $photoName);
        $photoPath = '/uploads/students/' . $photoName;

        $admission = \App\Models\Admission::where('enrollment_no', $id)->orWhere('id', $id)->first();
        if ($admission) {
            $admission->photo = $photoPath;
            $admission->save();
        }

        $certificate = \App\Models\Certificate::where('regd_no', $id)->orWhere('id', $id)->first();
        if ($certificate) {
            $certificate->photo = $photoPath;
            $certificate->save();
        }

        return back()->with('photo_success', 'Student photo updated successfully!');
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

    // Sanitize blog HTML content: remove empty ghost paragraphs and hoist floated images to the top of paragraph
    private function sanitizeAndHoistBlogContent($content)
    {
        if (empty($content)) return '';

        // 1. Remove empty ghost paragraphs (<p>&nbsp;</p>, <p><br></p>, etc.)
        $cleaned = preg_replace('/<p[^>]*>(?:\s|&nbsp;|<br[^>]*>)*<\/p>/i', '', $content);

        // 2. Fix floated images placed inside paragraphs after text:
        // Hoist the floated image to the start of that paragraph so text wraps neatly from line 1
        $cleaned = preg_replace_callback(
            '/<p([^>]*)>((?:(?!<p|<\/p>).)*?)(<img[^>]+(?:class="[^"]*img-float-(?:left|right)[^"]*"|style="[^"]*float:\s*(?:left|right)[^"]*")[^>]*>)((?:(?!<p|<\/p>).)*?)<\/p>/is',
            function ($matches) {
                $pAttrs = $matches[1];
                $beforeImg = trim($matches[2]);
                $img = $matches[3];
                $afterImg = trim($matches[4]);

                if (empty($beforeImg)) {
                    return $matches[0];
                }

                $combinedText = $beforeImg . ($beforeImg && $afterImg ? ' ' : '') . $afterImg;
                return '<p' . $pAttrs . '>' . $img . $combinedText . '</p>';
            },
            $cleaned
        );

        return $cleaned;
    }

    public function storeSuccessfulStudent(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:10240',
            'batch_year' => 'nullable|string|max:100',
        ]);

        $uploadsDir = public_path('uploads/students');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $photoFile = $request->file('photo');
        $photoName = time() . '-student-' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
        $photoFile->move($uploadsDir, $photoName);

        \App\Models\SuccessfulStudent::create([
            'name' => $request->input('name'),
            'course' => $request->input('course'),
            'achievement' => $request->input('achievement'),
            'photo' => '/uploads/students/' . $photoName,
            'batch_year' => $request->input('batch_year') ?: 'Certified Technician',
            'order_num' => 0
        ]);

        return back()->with('gallery_success', 'Successful student added to the top live ticker!');
    }

    public function updateSuccessfulStudent(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = \App\Models\SuccessfulStudent::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'batch_year' => 'nullable|string|max:100',
        ]);

        $student->name = $request->input('name');
        $student->course = $request->input('course');
        $student->achievement = $request->input('achievement');
        $student->batch_year = $request->input('batch_year') ?: 'Certified Technician';

        if ($request->hasFile('photo')) {
            $uploadsDir = public_path('uploads/students');
            if (!file_exists($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }
            $photoFile = $request->file('photo');
            $photoName = time() . '-student-' . uniqid() . '.' . $photoFile->getClientOriginalExtension();
            $photoFile->move($uploadsDir, $photoName);
            $student->photo = '/uploads/students/' . $photoName;
        }

        $student->save();
        return back()->with('gallery_success', 'Successful student record updated!');
    }

    public function deleteSuccessfulStudent($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $student = \App\Models\SuccessfulStudent::findOrFail($id);
        if ($student->photo && str_starts_with($student->photo, '/uploads/')) {
            $path = public_path(ltrim($student->photo, '/'));
            if (file_exists($path)) @unlink($path);
        }
        $student->delete();
        return back()->with('gallery_success', 'Student removed from ticker successfully!');
    }

    public function storeSuccessStoryVideo(Request $request)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'earning_badge' => 'nullable|string|max:255',
            'story_description' => 'nullable|string',
        ]);

        $videoUrl = trim($request->input('video_url', ''));
        $thumbnailUrl = null;

        $uploadsDir = public_path('uploads/videos');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        if ($request->hasFile('video_file')) {
            $vFile = $request->file('video_file');
            $vName = time() . '-story-' . uniqid() . '.' . $vFile->getClientOriginalExtension();
            $vFile->move($uploadsDir, $vName);
            $videoUrl = '/uploads/videos/' . $vName;
        }

        if ($request->hasFile('thumbnail')) {
            $tFile = $request->file('thumbnail');
            $tName = time() . '-thumb-' . uniqid() . '.' . $tFile->getClientOriginalExtension();
            $tFile->move($uploadsDir, $tName);
            $thumbnailUrl = '/uploads/videos/' . $tName;
        } elseif (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches)) {
            $thumbnailUrl = "https://img.youtube.com/vi/{$matches[1]}/hqdefault.jpg";
        }

        if (empty($videoUrl)) {
            return back()->withErrors(['gallery_error' => 'Please provide either a Video file or YouTube Video URL for the success story.']);
        }

        \App\Models\SuccessStoryVideo::create([
            'student_name' => $request->input('student_name'),
            'course' => $request->input('course'),
            'title' => $request->input('title'),
            'video_url' => $videoUrl,
            'thumbnail_url' => $thumbnailUrl,
            'earning_badge' => $request->input('earning_badge') ?: 'Earns ₹40,000+/mo',
            'story_description' => $request->input('story_description'),
            'order_num' => 0
        ]);

        return back()->with('gallery_success', 'Success story video added! It will auto-rotate every 5 seconds on the gallery page.');
    }

    public function updateSuccessStoryVideo(Request $request, $id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $story = \App\Models\SuccessStoryVideo::findOrFail($id);
        $request->validate([
            'student_name' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'earning_badge' => 'nullable|string|max:255',
            'story_description' => 'nullable|string',
        ]);

        $story->student_name = $request->input('student_name');
        $story->course = $request->input('course');
        $story->title = $request->input('title');
        $story->earning_badge = $request->input('earning_badge') ?: 'Earns ₹40,000+/mo';
        $story->story_description = $request->input('story_description');

        if ($request->input('video_url')) {
            $story->video_url = trim($request->input('video_url'));
        }

        $uploadsDir = public_path('uploads/videos');
        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        if ($request->hasFile('video_file')) {
            $vFile = $request->file('video_file');
            $vName = time() . '-story-' . uniqid() . '.' . $vFile->getClientOriginalExtension();
            $vFile->move($uploadsDir, $vName);
            $story->video_url = '/uploads/videos/' . $vName;
        }

        if ($request->hasFile('thumbnail')) {
            $tFile = $request->file('thumbnail');
            $tName = time() . '-thumb-' . uniqid() . '.' . $tFile->getClientOriginalExtension();
            $tFile->move($uploadsDir, $tName);
            $story->thumbnail_url = '/uploads/videos/' . $tName;
        } elseif (!$story->thumbnail_url && preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $story->video_url, $matches)) {
            $story->thumbnail_url = "https://img.youtube.com/vi/{$matches[1]}/hqdefault.jpg";
        }

        $story->save();
        return back()->with('gallery_success', 'Success story video updated!');
    }

    public function deleteSuccessStoryVideo($id)
    {
        if (!session()->has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $story = \App\Models\SuccessStoryVideo::findOrFail($id);
        if ($story->video_url && str_starts_with($story->video_url, '/uploads/')) {
            $path = public_path(ltrim($story->video_url, '/'));
            if (file_exists($path)) @unlink($path);
        }
        if ($story->thumbnail_url && str_starts_with($story->thumbnail_url, '/uploads/')) {
            $path = public_path(ltrim($story->thumbnail_url, '/'));
            if (file_exists($path)) @unlink($path);
        }
        $story->delete();
        return back()->with('gallery_success', 'Success story video removed successfully!');
    }
}

