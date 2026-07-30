@extends('layouts.app')

@section('title', 'Fee Structure | Smart Technical Training Institute')

@section('meta')
    <meta name="keywords" content="AC mechanic course Patna, washing machine mechanic course Patna, fridge mechanic course in Patna, mobile repairing course in Patna, laptop repairing course in Patna" />
    <meta name="description" content="Learn AC repairing and washing machine repairing with affordable fee structure. Get hands-on training, expert guidance, and job-ready skills at low cost.">
    <link rel="canonical" href="{{ route('feestructure') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-[#FACA0A] to-yellow-500 text-black py-12 sm:py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-3 sm:mb-4">Fee Structure</h1>
    <p class="text-sm sm:text-base md:text-lg opacity-90 text-black">
      Affordable & transparent pricing for quality technical education
    </p>
  </div>
</section>

<!-- FEE TABLE -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-16">
  <div class="overflow-x-auto bg-white shadow-xl rounded-2xl border border-gray-100">
    <table class="w-full border-collapse min-w-[600px]">
      <thead class="bg-[#FACA0A] text-black">
        <tr>
          <th class="px-4 sm:px-6 py-3.5 sm:py-4 text-left font-extrabold text-xs sm:text-sm uppercase tracking-wider">Course Name</th>
          <th class="px-4 sm:px-6 py-3.5 sm:py-4 text-left font-extrabold text-xs sm:text-sm uppercase tracking-wider">Duration</th>
          <th class="px-4 sm:px-6 py-3.5 sm:py-4 text-left font-extrabold text-xs sm:text-sm uppercase tracking-wider">Course Fee</th>
          <th class="px-4 sm:px-6 py-3.5 sm:py-4 text-left font-extrabold text-xs sm:text-sm uppercase tracking-wider">Certification</th>
        </tr>
      </thead>

      <tbody class="text-gray-700 divide-y divide-gray-100 text-xs sm:text-sm md:text-base">
        @forelse($fees as $fee)
        <tr class="hover:bg-yellow-50/50 transition">
          <td class="px-4 sm:px-6 py-3.5 sm:py-4 font-semibold text-gray-900">{{ $fee->course_name }}</td>
          <td class="px-4 sm:px-6 py-3.5 sm:py-4 whitespace-nowrap">{{ $fee->duration }}</td>
          <td class="px-4 sm:px-6 py-3.5 sm:py-4 font-bold text-gray-900 whitespace-nowrap">{{ $fee->course_fee }}</td>
          <td class="px-4 sm:px-6 py-3.5 sm:py-4 whitespace-nowrap">{{ $fee->certification }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-6 py-8 text-center text-gray-500 font-medium">Fee structure is currently being updated. Check back soon!</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</section>

@endsection
