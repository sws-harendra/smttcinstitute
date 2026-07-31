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

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
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
            'author_name' => 'nullable|string|max:255',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = '/uploads/' . $filename;
        }

        $blog = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $imageUrl,
            'author_name' => $request->author_name,
        ]);

        return response()->json([
            'id' => $blog->id,
            'image_url' => $blog->image_url,
            'message' => 'Blog created successfully'
        ], 201);
    }
}
