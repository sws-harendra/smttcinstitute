<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        return view('blog-detail', compact('blog'));
    }

    // API Methods
    public function apiIndex()
    {
        return response()->json(Blog::latest()->get());
    }

    public function apiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'cover_link' => 'nullable|string|max:1000',
            'title_color' => 'nullable|string|max:50',
            'title_font' => 'nullable|string|max:50',
            'title_size' => 'nullable|string|max:50',
            'title_weight' => 'nullable|string|max:50',
            'title_transform' => 'nullable|string|max:50',
            'author_name' => 'nullable|string|max:255',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;
        }

        $coverLink = $request->cover_link ? trim($request->cover_link) : null;
        if ($coverLink && !preg_match("~^(?:f|ht)tps?://~i", $coverLink) && !str_starts_with($coverLink, '/') && !str_starts_with($coverLink, '#')) {
            $coverLink = 'https://' . $coverLink;
        }

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $imageUrl,
            'cover_link' => $coverLink,
            'title_color' => $request->title_color ?: null,
            'title_font' => $request->title_font ?: null,
            'title_size' => $request->title_size ?: null,
            'title_weight' => $request->title_weight ?: null,
            'title_transform' => $request->title_transform ?: null,
            'author_name' => $request->author_name,
        ]);

        return response()->json([
            'id' => $blog->id,
            'image_url' => $blog->image_url,
            'message' => 'Blog created successfully'
        ], 201);
    }
}
