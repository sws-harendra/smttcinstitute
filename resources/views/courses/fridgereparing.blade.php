@extends('layouts.app')

@section('title', 'Fridge Repairing Course in Patna | Refrigerator Training Institute')

@section('meta')
    <meta name="keywords" content="Fridge Repairing Training Institute in Patna, refrigerator mechanic course Patna" />
    <meta name="description" content="Learn single door, double door, and frost-free refrigerator servicing and repairing in Patna.">
    <link rel="canonical" href="{{ route('courses.fridge') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
      Fridge Repairing Training Institute in Patna
    </h1>
    <p class="text-sm md:text-lg max-w-6xl mx-auto leading-relaxed mb-8">
      Comprehensive practical training in single door, double door, and frost-free refrigerators, gas charging, compressor testing, and thermostat troubleshooting.
    </p>
    <a href="{{ route('contact') }}" class="inline-block bg-white text-black px-10 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-md">
      Enquire Now
    </a>
  </div>
</section>

<!-- INTRO SECTION -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6">
    <p class="text-lg leading-relaxed mb-6">
      Our <b>fridge repairing training institute in Patna</b> offers a practical and industry focused course that trains students in refrigerator servicing and repair work. The program explains the working of single door double door and frost free refrigerators so students clearly understand how cooling systems function in real life conditions.
    </p>
  </div>
</section>

@endsection
