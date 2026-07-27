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
}
