@extends('layouts.app')

@section('title', 'Training Gallery | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="View our practical training lab, student practice sessions, and live machine repairing gallery at SMTTC Institute Patna.">
    <link rel="canonical" href="{{ route('gallery') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-yellow-500 to-[#FACA0A] py-12 sm:py-20 text-black text-center px-4">
  <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold">Training Gallery</h1>
  <p class="mt-2 sm:mt-4 text-sm sm:text-base text-black font-medium">A glimpse into our live practical training sessions and lab</p>
</section>

<!-- GALLERY GRID -->
<section class="py-10 sm:py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
      @forelse($galleries as $gallery)
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ Str::startsWith($gallery->image_url, '/uploads') ? asset($gallery->image_url) : asset($gallery->image_url) }}" class="w-full h-56 sm:h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image">
      </div>
      @empty
      <div class="col-span-full py-12 text-center bg-gray-50 rounded-2xl border border-dashed border-gray-200">
        <p class="text-gray-400 text-sm font-medium">Gallery is currently being updated. Check back soon!</p>
      </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
