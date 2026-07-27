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
        return view('gallery');
    }

    public function feestructure()
    {
        return view('feestructure');
    }

    public function sitemap()
    {
        return view('sitemap');
    }
}
