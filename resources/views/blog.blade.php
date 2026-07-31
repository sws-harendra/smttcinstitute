@extends('layouts.app')

@section('title', 'Blogs & Technical Articles | Smart Technical Training Institute')

@section('meta')
    <meta name="description" content="Read the latest articles on AC repairing, mobile servicing, laptop maintenance, and technical training guides in Patna.">
    <link rel="canonical" href="{{ route('blog.index') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-yellow-500 to-[#FACA0A] py-12 sm:py-20 text-black text-center px-4">
  <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold">Our Technical Blog</h1>
  <p class="mt-2 sm:mt-4 text-sm sm:text-base text-black font-medium">Latest news, updates, and technical guides from our expert trainers</p>
</section>

<!-- BLOG LISTING -->
<section class="max-w-[1320px] mx-auto px-4 sm:px-6 py-12 sm:py-20">
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
    @if(isset($blogs) && count($blogs) > 0)
        @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition flex flex-col justify-between border border-gray-100">
                <div>
                    <img src="{{ $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp') }}" alt="{{ $blog->title }}" class="w-full h-48 sm:h-56 object-cover bg-gray-100">
                    <div class="p-5 sm:p-6">
                        <div class="flex items-center gap-2 mb-2 flex-wrap">
                            <p class="text-[10px] sm:text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $blog->created_at->format('M d, Y') }}</p>
                            @if($blog->author_name)
                                <span class="text-gray-300 hidden sm:inline">&bull;</span>
                                <p class="text-[10px] sm:text-xs font-semibold text-indigo-500 uppercase tracking-wider"><i class="fa-solid fa-pen-nib text-[10px]"></i> {{ $blog->author_name }}</p>
                            @endif
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-3 text-gray-900 leading-snug line-clamp-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-xs sm:text-sm">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                    </div>
                </div>
                <div class="p-5 sm:p-6 pt-0">
                    <a href="{{ route('blog.show', $blog->id) }}" class="inline-block text-[#FACA0A] font-bold hover:underline text-sm">Read Full Article &rarr;</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-span-full text-center py-16">
            <p class="text-gray-500 text-base sm:text-lg">No blog posts available at the moment.</p>
        </div>
    @endif
  </div>
</section>

@endsection
