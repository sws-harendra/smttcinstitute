@extends('layouts.app')

@section('title', 'Training Gallery | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="View our practical training lab, student practice sessions, and live machine repairing gallery at SMTTC Institute Patna.">
    <link rel="canonical" href="{{ route('gallery') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-yellow-500 to-[#FACA0A] py-20 text-black text-center">
  <h1 class="text-4xl md:text-5xl font-extrabold">Training Gallery</h1>
  <p class="mt-4 text-black">A glimpse into our live practical training sessions and lab</p>
</section>

<!-- GALLERY GRID -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <div class="grid md:grid-cols-3 gap-8">
      @forelse($galleries as $gallery)
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ Str::startsWith($gallery->image_url, '/uploads') ? asset($gallery->image_url) : asset($gallery->image_url) }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image">
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
