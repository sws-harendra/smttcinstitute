@extends('layouts.app')

@section('title', 'Fee Structure | Smart Technical Training Institute')

@section('meta')
    <meta name="keywords" content="AC mechanic course Patna, washing machine mechanic course Patna, fridge mechanic course in Patna, mobile repairing course in Patna, laptop repairing course in Patna" />
    <meta name="description" content="Learn AC repairing and washing machine repairing with affordable fee structure. Get hands-on training, expert guidance, and job-ready skills at low cost.">
    <link rel="canonical" href="{{ route('feestructure') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-[#FACA0A] to-yellow-500 text-black py-16">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h1 class="text-4xl font-bold mb-4">Fee Structure</h1>
    <p class="text-lg opacity-90 text-black">
      Affordable & transparent pricing for quality technical education
    </p>
  </div>
</section>

<!-- FEE TABLE -->
<section class="max-w-7xl mx-auto px-6 py-16">
  <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
    <table class="w-full border-collapse">
      <thead class="bg-[#FACA0A] text-black">
        <tr>
          <th class="px-6 py-4 text-left font-bold">Course Name</th>
          <th class="px-6 py-4 text-left font-bold">Duration</th>
          <th class="px-6 py-4 text-left font-bold">Course Fee</th>
          <th class="px-6 py-4 text-left font-bold">Certification</th>
        </tr>
      </thead>

      <tbody class="text-gray-700 divide-y divide-gray-100">
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-6 py-4 font-semibold">AC Repairing</td>
          <td class="px-6 py-4">3 Months</td>
          <td class="px-6 py-4 font-bold text-gray-900">₹12,000</td>
          <td class="px-6 py-4">Yes</td>
        </tr>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-6 py-4 font-semibold">Washing Machine Repairing</td>
          <td class="px-6 py-4">2 Months</td>
          <td class="px-6 py-4 font-bold text-gray-900">₹9,000</td>
          <td class="px-6 py-4">Yes</td>
        </tr>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-6 py-4 font-semibold">LED / LCD TV Repairing</td>
          <td class="px-6 py-4">3 Months</td>
          <td class="px-6 py-4 font-bold text-gray-900">₹14,000</td>
          <td class="px-6 py-4">Yes</td>
        </tr>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-6 py-4 font-semibold">Mobile Repairing</td>
          <td class="px-6 py-4">3 Months</td>
          <td class="px-6 py-4 font-bold text-gray-900">₹15,000</td>
          <td class="px-6 py-4">Yes</td>
        </tr>
        <tr class="hover:bg-yellow-50 transition">
          <td class="px-6 py-4 font-semibold">Laptop Repairing</td>
          <td class="px-6 py-4">3 Months</td>
          <td class="px-6 py-4 font-bold text-gray-900">₹18,000</td>
          <td class="px-6 py-4">Yes</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

@endsection
