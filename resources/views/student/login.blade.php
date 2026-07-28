@extends('layouts.app')
@section('title', 'Student Login - SMTTC')
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

@if($errors->any())
    <div id="toast-error" class="fixed top-24 right-5 z-50 bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center justify-between shadow-lg animate-fade-in">
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-red-500 text-lg"></i>
            <span>{{ $errors->first() }}</span>
        </div>
        <button onclick="document.getElementById('toast-error').remove()" class="text-red-500 hover:text-red-700 ml-4">&times;</button>
    </div>
@endif

<section class="min-h-screen bg-slate-50 flex items-center justify-center py-20">
    <div class="w-full max-w-md mx-auto px-5">
        <!-- Login Card -->
        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 p-8 md:p-10 border border-slate-100">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-gradient-to-tr from-yellow-400 to-yellow-300 rounded-2xl mx-auto flex items-center justify-center shadow-lg shadow-yellow-200 mb-6">
                    <i class="fa-solid fa-user-graduate text-2xl text-slate-900"></i>
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Student Portal</h2>
                <p class="text-sm font-medium text-slate-500 mt-2">Sign in to access your dashboard and certificates.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('student.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Username</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-user text-slate-400"></i>
                        </div>
                        <input type="text" name="username" placeholder="Enter your username" required 
                               class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fa-solid fa-lock text-slate-400"></i>
                        </div>
                        <input type="password" name="password" placeholder="Enter your password" required 
                               class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition-all">
                    </div>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    Sign In Securely <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="mt-8 text-center text-xs font-medium text-slate-500">
                Don't have an account? <a href="{{ route('admission') }}" class="text-blue-600 hover:text-blue-700 font-bold hover:underline">Apply for Admission</a>
            </div>
        </div>
    </div>
</section>

@endsection
