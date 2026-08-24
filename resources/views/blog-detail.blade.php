@extends('layouts.app')

@section('title', $blog->title . ' | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <link rel="canonical" href="{{ route('blog.show', $blog->slug ?? $blog->id) }}" />
@endsection

@section('content')

<section class="py-10 sm:py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-xs sm:text-sm font-semibold text-gray-500 hover:text-black mb-6">
            &larr; Back to Blogs
        </a>

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden border border-gray-100 p-5 sm:p-8 md:p-12">
            <div class="flex flex-wrap items-center gap-3 mt-2 mb-2 sm:mb-3">
                <span class="text-xs font-bold text-[#FACA0A] uppercase tracking-widest bg-yellow-50 px-3 py-1 rounded-full">
                    {{ $blog->created_at->format('F d, Y') }}
                </span>
                @if($blog->author_name)
                <span class="text-xs font-bold text-indigo-600 uppercase tracking-widest bg-indigo-50 px-3 py-1 rounded-full flex items-center gap-1.5">
                    <i class="fa-solid fa-pen-nib"></i> {{ $blog->author_name }}
                </span>
                @endif
            </div>
            <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 sm:mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            @if($blog->image_url)
                <div class="mb-6 sm:mb-8 rounded-xl sm:rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url) }}" alt="{{ $blog->title }}" class="w-full max-h-[450px] object-cover">
                </div>
            @endif

            <style>
                .blog-article-content h1 { font-size: 1.875rem; font-weight: 800; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #0f172a; }
                .blog-article-content h2 { font-size: 1.5rem; font-weight: 700; margin-top: 1.25rem; margin-bottom: 0.5rem; color: #0f172a; }
                .blog-article-content h3 { font-size: 1.25rem; font-weight: 700; margin-top: 1rem; margin-bottom: 0.5rem; color: #0f172a; }
                .blog-article-content p { margin-bottom: 1rem; }
                .blog-article-content a { color: #2563eb; text-decoration: underline; font-weight: 600; }
                .blog-article-content a:hover { color: #1d4ed8; }
                .blog-article-content ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1rem; }
                .blog-article-content ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1rem; }
                .blog-article-content li { margin-bottom: 0.35rem; }
                .blog-article-content strong, .blog-article-content b { font-weight: 700; color: #0f172a; }
                .blog-article-content blockquote { border-left: 4px solid #FACA0A; padding-left: 1rem; font-style: italic; color: #475569; margin: 1rem 0; }
            </style>

            <div class="blog-article-content prose max-w-none text-gray-800 leading-relaxed text-sm sm:text-base md:text-lg">
                {!! $blog->content !!}
            </div>

            <div class="mt-8 sm:mt-12 pt-6 sm:pt-8 border-t border-gray-100 flex justify-between items-center flex-wrap gap-4">
                <span class="text-xs sm:text-sm font-semibold text-gray-500">Share this article:</span>
                <div class="flex gap-4">
                    <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('blog.show', $blog->slug ?? $blog->id)) }}" target="_blank" aria-label="Share on WhatsApp" class="w-9 h-9 sm:w-10 sm:h-10 bg-green-500 text-white rounded-full flex items-center justify-center shadow hover:scale-105 transition">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
