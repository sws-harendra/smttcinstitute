@extends('layouts.app')

@section('title', 'Blogs & Technical Articles | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="Read the latest articles on AC repairing, mobile servicing, laptop maintenance, and technical training guides in Patna.">
    <link rel="canonical" href="{{ route('blog.index') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-yellow-500 to-[#FACA0A] py-20 text-black text-center">
  <h1 class="text-4xl md:text-5xl font-extrabold">Our Technical Blog</h1>
  <p class="mt-4 text-black">Latest news, updates, and technical guides from our expert trainers</p>
</section>

<!-- BLOG LISTING -->
<section class="max-w-[1320px] mx-auto px-4 py-20">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @if(isset($blogs) && count($blogs) > 0)
        @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition flex flex-col justify-between border border-gray-100">
                <div>
                    <img src="{{ $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp') }}" alt="{{ $blog->title }}" class="w-full h-56 object-cover bg-gray-100">
                    <div class="p-6">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">{{ $blog->created_at->format('M d, Y') }}</p>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 leading-snug">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm">{{ $blog->content }}</p>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('blog.show', $blog->id) }}" class="inline-block text-[#FACA0A] font-bold hover:underline">Read Full Article &rarr;</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-span-full text-center py-16">
            <p class="text-gray-500 text-lg">No blog posts available at the moment.</p>
        </div>
    @endif
  </div>
</section>

@endsection
