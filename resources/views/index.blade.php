@extends('layouts.app')

@section('title', 'Complete AC, Fridge, Washing Machine Repair Course in Patna')

@section('meta')
    <meta name="keywords" content="AC mechanic course Patna, washing machine mechanic course Patna, fridge mechanic course in Patna, mobile repairing course in Patna, laptop repairing course in Patna" />
    <meta name="description" content="Learn AC, washing machine, fridge, mobile & laptop repairing courses in Patna. Get practical training, certification, and job-ready skills at affordable fees.">
    <link rel="canonical" href="{{ route('home') }}" />
    <meta property="og:title" content="Complete AC, Fridge, Washing Machine Repair Course in Patna" />
    <meta property="og:description" content="Learn AC, washing machine, fridge, mobile & laptop repairing courses in Patna. Get practical training, certification, and job-ready skills at affordable fees." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ asset('assets/images/logonewblack.webp') }}" />
@endsection

@section('content')

<!-- Hero Section -->
<section class="relative w-full min-h-[80vh] py-12 md:py-20 flex items-center overflow-hidden">
  <!-- Dynamic Slider Container -->
  <div id="dynamic-slider-container">
    @if(isset($sliders) && count($sliders) > 0)
        @foreach($sliders as $index => $slider)
            <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
              <img src="{{ Str::startsWith($slider->image_url, '/uploads') ? asset($slider->image_url) : asset($slider->image_url) }}" class="w-full h-full object-cover scale-105" alt="hero image" loading="eager" fetchpriority="high"/>
            </div>
        @endforeach
    @else
        <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 opacity-100">
          <img src="{{ asset('assets/images/hero1.webp') }}" class="w-full h-full object-cover scale-105" alt="hero image" loading="eager" fetchpriority="high"/>
        </div>
    @endif
  </div>

  <!-- Dark Overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- Content -->
  <div class="relative z-10 w-full flex items-center">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 text-white text-center">
      <h1 data-aos="fade-down" data-aos-duration="1000" class="text-2xl sm:text-4xl md:text-6xl font-extrabold leading-tight">
        Learn Future-Ready <br />
        <span class="text-[#FACA0A] drop-shadow-md">Technical Skills</span>
      </h1>

      <p data-aos="fade-up" data-aos-delay="200" class="mt-4 sm:mt-6 max-w-xl mx-auto text-sm sm:text-base md:text-lg text-gray-200 px-2">
        Professional training in AC, Washing Machine, 
        LED TV & Mobile Repairing with real-world practical experience.
      </p>

      <div data-aos="zoom-in" data-aos-delay="400" class="mt-6 sm:mt-8 flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center">
        <a href="#courses" class="btn-shine bg-[#FACA0A] hover:bg-yellow-500 text-black px-6 sm:px-8 py-3 rounded-full font-semibold shadow-lg transition transform hover:scale-105 w-full sm:w-auto text-center">
            Explore Courses
        </a>
        <a href="{{ route('contact') }}" class="btn-shine border border-white px-6 sm:px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-black transition transform hover:scale-105 w-full sm:w-auto text-center">
            Contact Us
        </a>
      </div>
    </div>
  </div>

  <!-- Dots -->
  <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 flex gap-2 sm:gap-3 z-20">
    <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-100"></span>
    <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-40"></span>
    <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-40"></span>
    <span class="dot w-2.5 h-2.5 sm:w-3 sm:h-3 bg-white rounded-full opacity-40"></span>
  </div>
</section>

<!-- Why Choose Us -->
<section class="py-12 sm:py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h2 data-aos="fade-up" class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">Why Choose <span class="text-shimmer">Our Institute</span></h2>
    <p data-aos="fade-up" data-aos-delay="100" class="text-gray-600 text-sm sm:text-base mb-8 sm:mb-12">We focus on practical skills that build real careers</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
      <div data-aos="fade-up" data-aos-delay="150" class="p-6 sm:p-8 bg-white rounded-xl shadow card-hover-lift">
        <div class="text-[48px] sm:text-[60px] mb-3 sm:mb-4 inline-block animate-float">🛠️</div>
        <h3 class="font-semibold text-lg sm:text-xl">100% Practical Training</h3>
        <p class="text-gray-600 text-sm mt-2">Work on real ACs, TVs, Mobiles & Washing Machines</p>
      </div>

      <div data-aos="fade-up" data-aos-delay="300" class="p-6 sm:p-8 bg-white rounded-xl shadow card-hover-lift">
        <div class="text-[48px] sm:text-[60px] mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 1s;">👨‍🏫</div>
        <h3 class="font-semibold text-lg sm:text-xl">Expert Trainers</h3>
        <p class="text-gray-600 text-sm mt-2">Learn from experienced technicians</p>
      </div>

      <div data-aos="fade-up" data-aos-delay="450" class="p-6 sm:p-8 bg-white rounded-xl shadow card-hover-lift sm:col-span-2 md:col-span-1">
        <div class="text-[48px] sm:text-[60px] mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 2s;">📜</div>
        <h3 class="font-semibold text-lg sm:text-xl">Certificate Provided</h3>
        <p class="text-gray-600 text-sm mt-2">Industry-recognized certification</p>
      </div>
    </div>
  </div>
</section>

<!-- Courses We Offer -->
<section class="py-12 sm:py-24 bg-gray-50" id="courses">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <h2 data-aos="fade-up" class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-8 sm:mb-16">
      Our <span class="text-black">Professional Courses</span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10">

      <div data-aos="fade-up" data-aos-delay="100" onclick="openCourse('ac')" class="course-card cursor-pointer bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center card-hover-lift">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">AC Repairing</h3>
        <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
          Our <b>AC REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a complete practical course that focuses on air conditioner installation servicing and repair work.
        </p>
        <a href="{{ route('courses.ac') }}" class="text-black font-semibold hover:underline text-sm sm:text-base">View Details →</a>
      </div>

      <div data-aos="fade-up" data-aos-delay="200" onclick="openCourse('washing')" class="course-card cursor-pointer bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center card-hover-lift">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Washing Machine Repairing</h3>
        <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
          The <b>WASHING MACHINE REPAIRING TRAINING INSTITUTE COURSE</b> is planned to give complete practical knowledge of both semi automatic and fully automatic washing machines.
        </p>
        <a href="{{ route('courses.washing') }}" class="text-black font-semibold hover:underline text-sm sm:text-base">View Details →</a>
      </div>

      <div data-aos="fade-up" data-aos-delay="300" onclick="openCourse('fridge')" class="course-card cursor-pointer bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center card-hover-lift">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Fridge Repairing</h3>
        <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
          Our <b>FRIDGE REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a practical and industry focused course that trains students in refrigerator servicing and repair work.
        </p>
        <a href="{{ route('courses.fridge') }}" class="text-black font-semibold hover:underline text-sm sm:text-base">View Details →</a>
      </div>

      <div data-aos="fade-up" data-aos-delay="400" onclick="openCourse('mobile')" class="course-card cursor-pointer bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center card-hover-lift">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Mobile Repairing</h3>
        <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
          Our <b>MOBILE REPAIRING TRAINING INSTITUTE IN PATNA</b> offers a practical and job oriented course created to build strong hands on skills in smartphone repairing.
        </p>
        <a href="{{ route('courses.mobile') }}" class="text-black font-semibold hover:underline text-sm sm:text-base">View Details →</a>
      </div>

      <div data-aos="fade-up" data-aos-delay="500" onclick="openCourse('laptop')" class="course-card cursor-pointer bg-white rounded-2xl shadow-lg p-6 sm:p-8 text-center card-hover-lift md:col-span-2 md:max-w-xl md:mx-auto">
        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Laptop Repairing</h3>
        <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
          Our <b>LAPTOP REPAIRING TRAINING INSTITUTE IN PATNA</b> provides practical skill based training in laptop hardware repair along with basic software servicing.
        </p>
        <a href="{{ route('courses.laptop') }}" class="text-black font-semibold hover:underline text-sm sm:text-base">View Details →</a>
      </div>  

    </div>
  </div>
</section>

<!-- Course Modal -->
<div id="courseModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-[99999] p-3 sm:p-4">
    <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-white border-b px-5 py-4 flex items-center justify-between rounded-t-2xl z-10">
            <h3 id="courseTitle" class="text-lg sm:text-2xl font-bold pr-4">Course Details</h3>
            <button onclick="closeCourse()" class="text-3xl text-gray-500 hover:text-red-500 leading-none">&times;</button>
        </div>
        <div id="courseContent" class="p-5 sm:p-6 md:p-8 text-gray-700 leading-relaxed text-sm sm:text-base"></div>
    </div>
</div>

<!-- Live Practical Training -->
<section class="py-12 sm:py-20 bg-gray-900 text-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
    <div data-aos="fade-right">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">Live Practical Training</h2>
      <p class="text-gray-300 text-sm sm:text-base mb-6 leading-relaxed">
        Students work on real faulty machines, learn live troubleshooting,
        fault detection, and complete repairing process.
      </p>
      <ul class="space-y-3 text-sm sm:text-base text-gray-200">
        <li>✔ Real Machines</li>
        <li>✔ Latest Tools</li>
        <li>✔ Individual Practice</li>
      </ul>
    </div>
    <div data-aos="fade-left">
      <img src="{{ asset('assets/images/lab.webp') }}" class="rounded-xl shadow-lg transform hover:scale-105 transition duration-500 w-full h-auto object-cover max-h-[400px]" alt="practical training image"/>
    </div>
  </div>
</section>

<!-- Who Can Join -->
<section class="py-12 sm:py-24 bg-gradient-to-b from-white to-blue-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center">
    <h2 data-aos="fade-up" class="text-2xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6">
      Who Can <span class="text-black">Join?</span>
    </h2>
    <p data-aos="fade-up" data-aos-delay="100" class="max-w-3xl mx-auto text-gray-600 mb-8 sm:mb-14 text-sm sm:text-base md:text-lg">
      Our technical courses are designed for beginners as well as experienced individuals.
      Anyone with the passion to learn and grow in the technical field can join.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
      <div data-aos="zoom-in" data-aos-delay="100" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg card-hover-lift">
        <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 inline-block animate-float">🎓</div>
        <h3 class="text-lg sm:text-xl font-bold mb-2">10th / 12th Pass</h3>
        <p class="text-gray-600 text-xs sm:text-sm">Students who want to start a technical career after school.</p>
      </div>

      <div data-aos="zoom-in" data-aos-delay="200" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg card-hover-lift">
        <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 0.5s;">📚</div>
        <h3 class="text-lg sm:text-xl font-bold mb-2">College Students</h3>
        <p class="text-gray-600 text-xs sm:text-sm">Gain practical skills along with your academic education.</p>
      </div>

      <div data-aos="zoom-in" data-aos-delay="300" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg card-hover-lift">
        <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 1s;">🔄</div>
        <h3 class="text-lg sm:text-xl font-bold mb-2">Dropouts</h3>
        <p class="text-gray-600 text-xs sm:text-sm">Restart your career with job-oriented technical training.</p>
      </div>

      <div data-aos="zoom-in" data-aos-delay="400" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg card-hover-lift">
        <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 1.5s;">💼</div>
        <h3 class="text-lg sm:text-xl font-bold mb-2">Working Professionals</h3>
        <p class="text-gray-600 text-xs sm:text-sm">Upgrade skills or switch careers to the technical field.</p>
      </div>

      <div data-aos="zoom-in" data-aos-delay="500" class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg card-hover-lift sm:col-span-2 lg:col-span-1">
        <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 inline-block animate-float" style="animation-delay: 2s;">🚀</div>
        <h3 class="text-lg sm:text-xl font-bold mb-2">Business Starters</h3>
        <p class="text-gray-600 text-xs sm:text-sm">Start your own service center or repair business.</p>
      </div>
    </div>
  </div>
</section>

<!-- Training Gallery (World-Class 3D Experience) -->
<section class="py-10 sm:py-16 bg-slate-900 text-white overflow-hidden relative">
  <!-- Glowing Background Orbs -->
  <div class="absolute top-1/2 left-1/4 w-48 sm:w-72 h-48 sm:h-72 bg-yellow-500/10 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>
  <div class="absolute top-1/2 right-1/4 w-48 sm:w-72 h-48 sm:h-72 bg-blue-500/10 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="text-center mb-4 sm:mb-6" data-aos="fade-up">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white">Training <span class="text-shimmer">Gallery</span></h2>
    </div>

    <!-- 3D Stage Container -->
    <div class="gallery-3d-stage relative h-[260px] sm:h-[370px] md:h-[410px] flex items-center justify-center">
      <div id="gallery3dCarousel" class="gallery-3d-carousel relative w-[200px] min-[400px]:w-[240px] sm:w-[340px] md:w-[440px] h-[170px] sm:h-[270px] md:h-[310px]">
        
        <div class="gallery-3d-card" data-index="0">
          <div class="inner-card">
            <img src="{{ asset('assets/images/g1.webp') }}" alt="AC Repairing Lab">
            <div class="card-caption">
              <h4>AC Repairing Lab</h4>
              <p>Real faulty ACs & Live Servicing Bench</p>
            </div>
          </div>
        </div>

        <div class="gallery-3d-card" data-index="1">
          <div class="inner-card">
            <img src="{{ asset('assets/images/g2.webp') }}" alt="Washing Machine Lab">
            <div class="card-caption">
              <h4>Washing Machine Setup</h4>
              <p>Automatic & Semi-Automatic Troubleshooting</p>
            </div>
          </div>
        </div>

        <div class="gallery-3d-card" data-index="2">
          <div class="inner-card">
            <img src="{{ asset('assets/images/g3.webp') }}" alt="Mobile Repairing Desk">
            <div class="card-caption">
              <h4>Mobile Repairing Desk</h4>
              <p>Hardware Micro-soldering & IC Replacement</p>
            </div>
          </div>
        </div>

        <div class="gallery-3d-card" data-index="3">
          <div class="inner-card">
            <img src="{{ asset('assets/images/lab.webp') }}" alt="Practical Lab Practice">
            <div class="card-caption">
              <h4>Practical Lab Practice</h4>
              <p>Individual Student Workstations</p>
            </div>
          </div>
        </div>

        <div class="gallery-3d-card" data-index="4">
          <div class="inner-card">
            <img src="{{ asset('assets/images/hero1.webp') }}" alt="Expert Guidance Session">
            <div class="card-caption">
              <h4>Expert Guidance Session</h4>
              <p>Step-by-step Technical Mentorship</p>
            </div>
          </div>
        </div>

      </div>

      <!-- Navigation Arrows -->
      <button id="prev3dBtn" aria-label="Previous Slide" class="absolute left-1 sm:left-6 md:left-12 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-yellow-400 hover:text-black border border-white/20 text-white flex items-center justify-center backdrop-blur-md shadow-2xl transition-all duration-300 transform hover:scale-110">
        <i class="fa-solid fa-chevron-left text-base sm:text-lg"></i>
      </button>
      <button id="next3dBtn" aria-label="Next Slide" class="absolute right-1 sm:right-6 md:right-12 z-30 w-11 h-11 sm:w-13 sm:h-13 rounded-full bg-white/10 hover:bg-yellow-400 hover:text-black border border-white/20 text-white flex items-center justify-center backdrop-blur-md shadow-2xl transition-all duration-300 transform hover:scale-110">
        <i class="fa-solid fa-chevron-right text-base sm:text-lg"></i>
      </button>
    </div>

    <!-- 3D Carousel Dots -->
    <div id="dots3dContainer" class="flex justify-center items-center gap-3 mt-6 relative z-20"></div>
  </div>
</section>

<!-- Student Reviews -->
<section class="py-12 sm:py-20 bg-gray-50 overflow-hidden">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
    <h2 data-aos="fade-up" class="text-2xl sm:text-3xl md:text-4xl font-bold mb-8 sm:mb-10">Student Reviews</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div data-aos="fade-up" data-aos-delay="100" class="bg-white p-6 rounded-xl shadow card-hover-lift">
        <span class="inline-block animate-bounce">⭐⭐⭐⭐⭐</span>
        <p class="mt-4 text-sm sm:text-base">"Best institute for AC repairing. Very practical."</p>
        <p class="mt-3 font-semibold text-sm sm:text-base">— Rahul Kumar</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="200" class="bg-white p-6 rounded-xl shadow card-hover-lift">
        <span class="inline-block animate-bounce" style="animation-delay: 0.2s;">⭐⭐⭐⭐⭐</span>
        <p class="mt-4 text-sm sm:text-base">"Now I run my own mobile repair shop."</p>
        <p class="mt-3 font-semibold text-sm sm:text-base">— Aman Singh</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="300" class="bg-white p-6 rounded-xl shadow card-hover-lift sm:col-span-2 md:col-span-1">
        <span class="inline-block animate-bounce" style="animation-delay: 0.4s;">⭐⭐⭐⭐⭐</span>
        <p class="mt-4 text-sm sm:text-base">"Teachers are very supportive."</p>
        <p class="mt-3 font-semibold text-sm sm:text-base">— Pankaj Verma</p>
      </div>
    </div>
  </div>
</section>

<!-- Latest Blogs Section -->
<section class="max-w-[1320px] mx-auto px-4 sm:px-6 py-12 sm:py-16 overflow-hidden">
  <div data-aos="fade-up" class="text-center mb-8 sm:mb-10">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold">Latest Blogs</h2>
    <p class="text-gray-600 mt-2 text-sm sm:text-base">Read our latest news and updates</p>
  </div>
  <div id="blog-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
    @if(isset($blogs) && count($blogs) > 0)
        @foreach($blogs as $index => $blog)
            <div data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" class="bg-white rounded-xl shadow-md overflow-hidden card-hover-lift flex flex-col justify-between">
                <div>
                    <img src="{{ $blog->image_url ? (Str::startsWith($blog->image_url, '/uploads') ? asset($blog->image_url) : asset($blog->image_url)) : asset('assets/images/default-blog.webp') }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover bg-gray-200">
                    <div class="p-5 sm:p-6">
                        <p class="text-xs text-gray-500 mb-2">{{ $blog->created_at->format('M d, Y') }}</p>
                        <h3 class="text-lg sm:text-xl font-bold mb-3 line-clamp-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                    </div>
                </div>
                <div class="px-5 sm:px-6 pb-6">
                    <a href="{{ route('blog.show', $blog->id) }}" class="text-[#FACA0A] font-semibold hover:underline text-sm">Read More &rarr;</a>
                </div>
            </div>
        @endforeach
    @else
        <p class="col-span-full text-center text-gray-500 py-8">No blog posts found.</p>
    @endif
  </div>
  <div data-aos="zoom-in" class="text-center mt-8">
    <a href="{{ route('blog.index') }}" class="btn-shine inline-block bg-[#FACA0A] text-black font-semibold px-6 py-2.5 rounded-full hover:bg-yellow-500 transition shadow-md hover:scale-105 transform text-sm">View All Blogs</a>
  </div>
</section>

<!-- FINAL CTA -->
<section class="py-12 sm:py-20 bg-gradient-to-r from-yellow-300 to-yellow-400 text-black text-center overflow-hidden px-4 sm:px-6">
  <div data-aos="zoom-in" class="max-w-4xl mx-auto">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">Start Your Technical Career Today</h2>
    <p class="mb-6 sm:mb-8 text-sm sm:text-base text-gray-800">Limited seats available. Book your free demo class now.</p>
    <div class="flex justify-center gap-4 flex-wrap">
      <a href="tel:7870516006" class="btn-shine bg-white text-black px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl transition transform hover:scale-105 text-sm sm:text-base">
        📞 Call Now: 7870516006
      </a>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".carousel-slide");
    let current = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.toggle("opacity-100", i === index);
        slide.classList.toggle("opacity-0", i !== index);
      });
    }

    if (slides.length > 1) {
      setInterval(() => {
        current = (current + 1) % slides.length;
        showSlide(current);
      }, 4000);
    }
});
</script>
@endsection
