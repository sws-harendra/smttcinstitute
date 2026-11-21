@extends('layouts.app')

@section('title', 'Sitemap | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="Sitemap of Smart Technical Training Institute Patna pages, courses, and resources.">
    <link rel="canonical" href="{{ route('sitemap') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-[#FACA0A] to-yellow-500 text-black py-16">
  <div class="max-w-7xl mx-auto px-6 text-center space-y-4">
    <h1 class="text-4xl font-extrabold tracking-tight">Website Sitemap</h1>
    <p class="text-lg opacity-90 text-black max-w-2xl mx-auto">Navigate easily to any section of our website, courses, and technical guides.</p>
    <div class="pt-2">
      <a href="{{ url('/sitemap.xml') }}" target="_blank" class="inline-flex items-center gap-2 bg-slate-950 text-amber-400 hover:bg-slate-900 hover:text-amber-300 text-xs font-bold px-4 py-2.5 rounded-xl shadow-lg transition">
        <i class="fa-solid fa-code"></i>
        <span>View XML Sitemap (sitemap.xml)</span>
        <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
      </a>
    </div>
  </div>
</section>

<section class="max-w-5xl mx-auto px-6 py-16">
  <div class="grid md:grid-cols-2 gap-10">
    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
      <h2 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-3 flex items-center gap-2">
        <span>📌</span> Main Pages
      </h2>
      <ul class="space-y-4 text-gray-700 font-medium">
        <li><a href="{{ route('home') }}" class="hover:text-[#FACA0A] transition">🏠 Home</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-[#FACA0A] transition">ℹ️ About Us</a></li>
        <li><a href="{{ route('admission') }}" class="hover:text-[#FACA0A] transition">🎓 Online Admission</a></li>
        <li><a href="{{ route('feestructure') }}" class="hover:text-[#FACA0A] transition">💰 Fee Structure</a></li>
        <li><a href="{{ route('blog.index') }}" class="hover:text-[#FACA0A] transition">📝 Technical Blog</a></li>
        <li><a href="{{ route('gallery') }}" class="hover:text-[#FACA0A] transition">🖼️ Training Gallery</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-[#FACA0A] transition">📞 Contact Us</a></li>
      </ul>
    </div>

    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100">
      <h2 class="text-2xl font-bold mb-6 text-gray-900 border-b pb-3 flex items-center gap-2">
        <span>⚡</span> Courses Offered
      </h2>
      <ul class="space-y-4 text-gray-700 font-medium">
        <li><a href="{{ route('courses.ac') }}" class="hover:text-[#FACA0A] transition">❄️ AC Repairing Course</a></li>
        <li><a href="{{ route('courses.washing') }}" class="hover:text-[#FACA0A] transition">🧺 Washing Machine Repairing Course</a></li>
        <li><a href="{{ route('courses.fridge') }}" class="hover:text-[#FACA0A] transition">🧊 Refrigerator Repairing Course</a></li>
        <li><a href="{{ route('courses.mobile') }}" class="hover:text-[#FACA0A] transition">📱 Mobile Phone Repairing Course</a></li>
        <li><a href="{{ route('courses.laptop') }}" class="hover:text-[#FACA0A] transition">💻 Laptop Repairing Course</a></li>
      </ul>
    </div>

    @if(isset($blogs) && count($blogs) > 0)
    <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-100 md:col-span-2">
      <div class="flex items-center justify-between border-b pb-3 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
          <span>📝</span> Technical Blog Guides & Articles
        </h2>
        <span class="text-xs bg-amber-100 text-amber-800 font-bold px-3 py-1 rounded-full">{{ count($blogs) }} Published</span>
      </div>
      <ul class="grid sm:grid-cols-2 gap-4 text-gray-700 font-medium">
        @foreach($blogs as $blog)
        <li>
          <a href="{{ route('blog.show', $blog->slug ?: $blog->id) }}" class="hover:text-[#FACA0A] transition flex items-center gap-2 group p-2 rounded-lg hover:bg-amber-50/50">
            <span class="text-slate-400 group-hover:text-amber-500 transition">📄</span>
            <span class="truncate">{{ $blog->title }}</span>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    @endif
  </div>
</section>

@endsection
