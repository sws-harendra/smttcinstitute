@extends('layouts.app')

@section('title', 'Laptop Repairing Course in Patna | Chip Level Laptop Training')

@section('meta')
    <meta name="keywords" content="Laptop Repairing Course in Patna, laptop repair training institute Patna" />
    <meta name="description" content="Learn chip-level laptop hardware and software repairing in Patna with expert technicians.">
    <link rel="canonical" href="{{ route('courses.laptop') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-12 sm:py-20 px-4">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold mb-4 sm:mb-6">
      Laptop Repairing Course in Patna
    </h1>
    <p class="text-xs sm:text-base md:text-lg max-w-5xl mx-auto leading-relaxed mb-6 sm:mb-8 text-black/90">
      Master motherboard diagnostics, power supply circuits, screen replacement, BGA reballing, and OS/BIOS troubleshooting on modern laptops.
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
      Our <b>laptop repairing training institute in Patna</b> provides practical skill based training in laptop hardware repair along with basic software servicing. This course helps students understand important internal laptop parts like motherboards, power circuits, display panels, keyboards, storage devices, batteries and cooling systems.
    </p>
  </div>
</section>

@endsection
