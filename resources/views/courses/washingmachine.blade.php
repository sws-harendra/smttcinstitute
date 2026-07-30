@extends('layouts.app')

@section('title', 'Washing Machine Repairing Course in Patna')

@section('meta')
    <meta name="keywords" content="Washing Machine Repairing Course in Patna, washing machine mechanic course Patna" />
    <meta name="description" content="Learn fully automatic and semi-automatic washing machine repair training in Patna with expert practical guidance.">
    <link rel="canonical" href="{{ route('courses.washing') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-12 sm:py-20 px-4">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold mb-4 sm:mb-6">
      Washing Machine Repairing Course in Patna
    </h1>
    <p class="text-xs sm:text-base md:text-lg max-w-5xl mx-auto leading-relaxed mb-6 sm:mb-8 text-black/90">
      Complete practical training in semi-automatic and fully-automatic (top load & front load) washing machine repairing, PCB troubleshooting, motor rewiring, and drain system servicing.
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
      Our <b>washing machine repairing training course</b> is planned to give complete practical knowledge of both semi automatic and fully automatic washing machines. Students learn about different machine types, their working process and the common problems that occur during regular daily use.
    </p>
  </div>
</section>

@endsection
