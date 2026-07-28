@extends('layouts.app')
@section('title', 'Student Dashboard - SMTTC')
@section('content')

<!-- Toast Notifications -->
@if(session('success'))
    <div id="toast" class="fixed top-24 right-5 z-50 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-lg animate-fade-in">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
        <button onclick="document.getElementById('toast').remove()" class="text-emerald-500 hover:text-emerald-700 ml-4">&times;</button>
    </div>
@endif

<section class="min-h-screen bg-slate-50 py-12 md:py-20">
    <div class="max-w-5xl mx-auto px-5">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">Welcome, {{ $student->name }}!</h1>
                <p class="text-sm font-medium text-slate-500 mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-id-badge"></i> Enrollment No: <span class="font-bold text-slate-800">{{ $student->enrollment_no }}</span>
                </p>
            </div>
            
            <form action="{{ route('student.logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-white border border-slate-200 hover:bg-slate-100 text-slate-600 font-bold text-xs shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Sign Out
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Profile Card -->
            <div class="md:col-span-1 space-y-8">
                <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-xl shadow-slate-200/40 text-center">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white shadow-lg mb-6">
                        <img src="{{ $student->photo ? (Str::startsWith($student->photo, 'http') ? $student->photo : asset($student->photo)) : asset('assets/images/placeholder-user.jpg') }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">{{ $student->name }}</h3>
                    <p class="text-xs font-semibold text-blue-600 mt-1 uppercase tracking-wider">{{ $student->course }}</p>
                    
                    <div class="mt-6 pt-6 border-t border-slate-100 space-y-4 text-left">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Phone</p>
                            <p class="text-sm font-medium text-slate-700 mt-0.5">{{ $student->mobile_no }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Email</p>
                            <p class="text-sm font-medium text-slate-700 mt-0.5">{{ $student->email }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Center</p>
                            <p class="text-sm font-medium text-slate-700 mt-0.5">{{ $student->center }} ({{ $student->district }})</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="md:col-span-2 space-y-8">
                
                <!-- Certificate Status Card -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 border border-slate-100 shadow-xl shadow-slate-200/40 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-5 pointer-events-none">
                        <i class="fa-solid fa-certificate text-9xl"></i>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-award text-yellow-500"></i> Course Certificate
                    </h3>

                    @if($certificate)
                        <div class="bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-100 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
                            <div>
                                <h4 class="font-bold text-emerald-800 text-base">Certificate Approved!</h4>
                                <p class="text-xs text-emerald-600 mt-1 font-medium">Your course completion certificate has been generated.</p>
                                <div class="mt-4 flex items-center gap-4 text-xs font-semibold text-emerald-700 bg-white/60 w-fit px-3 py-1.5 rounded-lg border border-emerald-100">
                                    <span><i class="fa-solid fa-hashtag opacity-70"></i> {{ $certificate->sl_no }}</span>
                                    <span><i class="fa-regular fa-calendar opacity-70"></i> {{ $certificate->issued_date ? $certificate->issued_date->format('M d, Y') : '-' }}</span>
                                </div>
                            </div>
                            <a href="{{ route('certificate.view', $student->enrollment_no) }}" target="_blank" class="shrink-0 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg shadow-emerald-200 transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                                <i class="fa-solid fa-download"></i> Download Certificate
                            </a>
                        </div>
                    @else
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-8 text-center relative z-10">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-slate-300 text-2xl mx-auto shadow-sm mb-4">
                                <i class="fa-solid fa-hourglass-half"></i>
                            </div>
                            <h4 class="font-bold text-slate-800 text-base">Certificate Pending</h4>
                            <p class="text-xs text-slate-500 mt-2 max-w-sm mx-auto">Your certificate will be available here once it is approved and generated by the administration team after course completion.</p>
                        </div>
                    @endif
                </div>

                <!-- Personal Info Tab -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 border border-slate-100 shadow-xl shadow-slate-200/40">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-6">
                        <i class="fa-solid fa-address-card text-blue-500"></i> Admission Details
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Father's Name</p>
                            <p class="text-sm font-medium text-slate-800 mt-1">{{ $student->father_name }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Mother's Name</p>
                            <p class="text-sm font-medium text-slate-800 mt-1">{{ $student->mother_name }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Date of Birth</p>
                            <p class="text-sm font-medium text-slate-800 mt-1">{{ \Carbon\Carbon::parse($student->dob)->format('d M, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Gender</p>
                            <p class="text-sm font-medium text-slate-800 mt-1">{{ $student->gender }}</p>
                        </div>
                        <div class="sm:col-span-2">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Full Address</p>
                            <p class="text-sm font-medium text-slate-800 mt-1">{{ $student->address }}, {{ $student->district }}, {{ $student->state }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
