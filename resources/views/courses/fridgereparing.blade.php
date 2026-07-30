@extends('layouts.app')

@section('title', 'Fridge Repairing Course in Patna | Refrigerator Training Institute')

@section('meta')
    <meta name="keywords" content="Fridge Repairing Training Institute in Patna, refrigerator mechanic course Patna" />
    <meta name="description" content="Learn single door, double door, and frost-free refrigerator servicing and repairing in Patna.">
    <link rel="canonical" href="{{ route('courses.fridge') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-12 sm:py-20 px-4">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold mb-4 sm:mb-6">
      Fridge Repairing Training Institute in Patna
    </h1>
    <p class="text-xs sm:text-base md:text-lg max-w-5xl mx-auto leading-relaxed mb-6 sm:mb-8 text-black/90">
      Comprehensive practical training in single door, double door, and frost-free refrigerators, gas charging, compressor testing, and thermostat troubleshooting.
    </p>
    <a href="{{ route('contact') }}" class="inline-block bg-white text-black px-8 sm:px-10 py-3 rounded-full font-bold hover:bg-gray-100 transition shadow-md text-sm sm:text-base">
      Enquire Now
    </a>
  </div>
</section>

<!-- INTRO SECTION -->
<section class="py-10 sm:py-16 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <p class="text-sm sm:text-base md:text-lg leading-relaxed">
      Our <b>fridge repairing training institute in Patna</b> offers a practical and industry focused course that trains students in refrigerator servicing and repair work. The program explains the working of single door double door and frost free refrigerators so students clearly understand how cooling systems function in real life conditions.
    </p>
  </div>
</section>

@endsection
