@extends('layouts.app')

@section('title', $blog->title . ' | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <link rel="canonical" href="{{ route('blog.show', $blog->id) }}" />
@endsection

@section('content')

<section class="py-10 sm:py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-xs sm:text-sm font-semibold text-gray-500 hover:text-black mb-6">
            &larr; Back to Blogs
        </a>

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-5 sm:p-8 md:p-12">
            <span class="text-xs font-bold text-[#FACA0A] uppercase tracking-widest bg-yellow-50 px-3 py-1 rounded-full">
                {{ $blog->created_at->format('F d, Y') }}
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold text-gray-900 mt-3 sm:mt-4 mb-4 sm:mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            @if($blog->image_url)
                <div class="mb-6 sm:mb-8 rounded-xl sm:rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url) }}" alt="{{ $blog->title }}" class="w-full max-h-[450px] object-cover">
                </div>
            @endif

            <div class="prose max-w-none text-gray-700 leading-relaxed text-sm sm:text-base md:text-lg space-y-4 sm:space-y-6">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <div class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-gray-100 flex justify-between items-center flex-wrap gap-4">
                <span class="text-xs sm:text-sm font-semibold text-gray-500">Share this article:</span>
                <div class="flex gap-4">
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog->id)) }}" target="_blank" aria-label="Share on WhatsApp" class="w-9 h-9 sm:w-10 sm:h-10 bg-green-500 text-white rounded-full flex items-center justify-center shadow hover:scale-105 transition">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
