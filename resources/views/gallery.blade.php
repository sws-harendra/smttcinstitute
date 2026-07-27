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
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g1.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 1">
      </div>
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g2.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 2">
      </div>
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g3.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 3">
      </div>
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g4.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 4">
      </div>
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g5.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 5">
      </div>
      <div class="overflow-hidden rounded-2xl shadow-lg bg-white group">
        <img src="{{ asset('assets/images/g6.webp') }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 6">
      </div>
    </div>
  </div>
</section>

@endsection
