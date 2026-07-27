@extends('layouts.app')

@section('title', 'AC Repair Training in Patna | Air Conditioner Repair Course')

@section('meta')
    <meta name="keywords" content="AC Repair Training in Patna, air conditioner repairing course in Patna, AC mechanic course Patna" />
    <meta name="description" content="Learn AC repair training in Patna with a professional air conditioner repairing course. Get hands on skills, expert guidance, and job ready certification.">
    <link rel="canonical" href="{{ route('courses.ac') }}" />
@endsection

@section('content')

<!-- HERO SECTION -->
<section class="bg-[#FACA0A] text-black py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-6">
      AC Repair Training in Patna – Practical Air Conditioner Repairing Course
    </h1>

    <p class="text-sm md:text-lg max-w-6xl mx-auto leading-relaxed mb-8">
      Our <b>AC repair training in Patna</b> is meant for people who seriously want to earn
      through practical work in the air conditioning field. This course focuses on
      real repairing, servicing, installation and fault finding work that happens
      daily in homes, offices and commercial places. Students work directly on live
      AC units and learn how actual problems are solved on site like a professional
      technician.
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
      This <b>air conditioner repairing course in Patna</b> is a good fit for fresh learners
      as well as those who already know some technical work and want to move ahead.
      Training is conducted as per current market practices so students feel confident
      working on split AC, window AC and basic commercial systems.
    </p>
    <p class="text-lg leading-relaxed">
      By the end of the course, students become comfortable identifying faults,
      repairing components and servicing AC systems in a safe and professional manner.
    </p>
  </div>
</section>

<!-- ABOUT THE COURSE -->
<section class="py-16 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-10 text-black">
      About the Course
    </h2>
    <p class="text-lg leading-relaxed mb-6">
      During this <b>AC mechanic course Patna,</b> we train students slowly and properly starting from the very basics and then moving towards advanced repairing work. Many students come with no background so we first explain how an air conditioner actually works including refrigeration cycle electrical parts and airflow system. After that students learn how to find faults, test different parts with the right tools and repair the unit with confidence.
    </p>
  </div>
</section>

@endsection
