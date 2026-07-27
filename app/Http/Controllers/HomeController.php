<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\SliderImage;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = SliderImage::latest()->get();
        $blogs = Blog::latest()->take(6)->get();

        return view('index', compact('sliders', 'blogs'));
    }
}
