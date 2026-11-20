<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\SliderImage;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = SliderImage::orderBy('id', 'asc')->get();
        $blogs = Blog::latest()->take(6)->get();
        $fees = \App\Models\FeeStructure::all();

        return view('index', compact('sliders', 'blogs', 'fees'));
    }
}
