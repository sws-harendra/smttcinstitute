@extends('layouts.app')

@section('title', 'Mobile Repairing Course in Patna | Smartphone Repair Institute')

@section('meta')
    <meta name="keywords" content="Mobile Repairing Course in Patna, mobile phone mechanic course Patna" />
    <meta name="description" content="Master smartphone hardware and software repairing in Patna with hands-on chip level practical training.">
    <link rel="canonical" href="{{ route('courses.mobile') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
      Mobile Repairing Course in Patna
    </h1>
    <p class="text-sm md:text-lg max-w-6xl mx-auto leading-relaxed mb-8">
      Build strong hands-on skills in smartphone repairing: display replacement, IC jumpering, battery charging faults, network problems, and software flashing.
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
      Our <b>mobile repairing training institute in Patna</b> offers a practical and job oriented course created to build strong hands on skills in smartphone repairing. This training helps students learn how to find and repair common mobile phone problems like display damage, battery issues, charging faults, network problems and software related errors.
    </p>
  </div>
</section>

@endsection
