@extends('layouts.app')

@section('title', $blog->title . ' | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <link rel="canonical" href="{{ route('blog.show', $blog->id) }}" />
@endsection

@section('content')

<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-black mb-8">
            &larr; Back to Blogs
        </a>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-8 md:p-12">
            <span class="text-xs font-bold text-[#FACA0A] uppercase tracking-widest bg-yellow-50 px-3 py-1 rounded-full">
                {{ $blog->created_at->format('F d, Y') }}
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            @if($blog->image_url)
                <div class="mb-8 rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url) }}" alt="{{ $blog->title }}" class="w-full max-h-[450px] object-cover">
                </div>
            @endif

            <div class="prose max-w-none text-gray-700 leading-relaxed text-base md:text-lg space-y-6">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-100 flex justify-between items-center flex-wrap gap-4">
                <span class="text-sm font-semibold text-gray-500">Share this article:</span>
                <div class="flex gap-4">
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog->id)) }}" target="_blank" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center shadow hover:scale-105 transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
