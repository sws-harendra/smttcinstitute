@extends('layouts.app')

@section('title', 'About Us | Smart Technical Training Institute')

@section('meta')
    <meta name="keywords" content="Enroll in AC mechanic course in Patna and washing machine mechanic course in Patna. Learn practical skills, hands-on training, and job-ready repair techniques." />
    <meta name="description" content="Enroll in AC mechanic course in Patna and washing machine mechanic course in Patna. Learn practical skills, hands-on training, and job-ready repair techniques.">
    <link rel="canonical" href="{{ route('about') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="relative bg-gradient-to-r from-[#FACA0A] to-yellow-500 py-24 text-black">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl md:text-5xl font-extrabold mb-4">About Us</h1>
    <p class="max-w-2xl mx-auto text-lg text-black">
      Building skilled technicians through practical technical education
    </p>
  </div>
</section>

<!-- WHO WE ARE -->
<section class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
    <div>
      <h2 class="text-3xl font-bold mb-4">
        Who <span class="text-black">We Are</span>
      </h2>
      <p class="text-gray-700 leading-relaxed mb-4">
        We are a professional Technical Teaching Centre providing high-quality
        training in AC Repairing, Washing Machine Repairing, LED/LCD TV Repairing
        and Mobile Phone Repairing.
      </p>
      <p class="text-gray-700 leading-relaxed">
        Our institute focuses on real-world practical training, live fault finding,
        and hands-on experience to make students job-ready and self-reliant.
      </p>
    </div>
    <img src="{{ asset('assets/images/hero1.webp') }}" class="rounded-xl shadow-lg" alt="Training Lab">
  </div>
</section>

<!-- MISSION & VISION -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">
    <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
      <h3 class="text-2xl font-semibold mb-4">🎯 Our Mission</h3>
      <p class="text-gray-700">
        To provide affordable, practical and skill-based technical education
        that helps students secure jobs or start their own repair businesses.
      </p>
    </div>

    <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
      <h3 class="text-2xl font-semibold mb-4">🚀 Our Vision</h3>
      <p class="text-gray-700">
        To become the leading technical training institute known for producing
        highly skilled and confident technicians across the country.
      </p>
    </div>
  </div>
</section>

@endsection
