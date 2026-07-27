@extends('layouts.app')

@section('title', 'Sitemap | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="Sitemap of Smart Technical Training Institute Patna pages, courses, and resources.">
    <link rel="canonical" href="{{ route('sitemap') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-[#FACA0A] to-yellow-500 text-black py-16">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl font-bold mb-4">HTML Sitemap</h1>
    <p class="text-lg opacity-90 text-black">Navigate easily to any section of our website</p>
  </div>
</section>

<section class="max-w-5xl mx-auto px-6 py-16">
  <div class="grid md:grid-cols-2 gap-10">
    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
      <h2 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-3">Main Pages</h2>
      <ul class="space-y-4 text-gray-700 font-medium">
        <li><a href="{{ route('home') }}" class="hover:text-[#FACA0A] transition">🏠 Home</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-[#FACA0A] transition">ℹ️ About Us</a></li>
        <li><a href="{{ route('feestructure') }}" class="hover:text-[#FACA0A] transition">💰 Fee Structure</a></li>
        <li><a href="{{ route('blog.index') }}" class="hover:text-[#FACA0A] transition">📝 Technical Blog</a></li>
        <li><a href="{{ route('gallery') }}" class="hover:text-[#FACA0A] transition">🖼️ Training Gallery</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-[#FACA0A] transition">📞 Contact Us</a></li>
      </ul>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
      <h2 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-3">Courses Offered</h2>
      <ul class="space-y-4 text-gray-700 font-medium">
        <li><a href="{{ route('courses.ac') }}" class="hover:text-[#FACA0A] transition">❄️ AC Repairing Course</a></li>
        <li><a href="{{ route('courses.washing') }}" class="hover:text-[#FACA0A] transition">🧺 Washing Machine Repairing Course</a></li>
        <li><a href="{{ route('courses.fridge') }}" class="hover:text-[#FACA0A] transition">🧊 Refrigerator Repairing Course</a></li>
        <li><a href="{{ route('courses.mobile') }}" class="hover:text-[#FACA0A] transition">📱 Mobile Phone Repairing Course</a></li>
        <li><a href="{{ route('courses.laptop') }}" class="hover:text-[#FACA0A] transition">💻 Laptop Repairing Course</a></li>
      </ul>
    </div>
  </div>
</section>

@endsection
