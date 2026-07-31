<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Smart Technical Training Institute - Patna')</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('build.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="{{ asset('script.min.js') }}" defer></script>
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    
    <!-- Premium Google Fonts (Outfit + Dancing Script & Caveat Cursive Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Dancing+Script:wght@600;700&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body, h1, h2, h3, h4, h5, h6, p, a, span, div, button, input {
            font-family: 'Outfit', sans-serif;
        }
        .font-cursive {
            font-family: 'Dancing Script', 'Caveat', cursive !important;
        }
        .font-handwriting {
            font-family: 'Caveat', 'Dancing Script', cursive !important;
        }
        /* Smooth Scroll & Global Responsiveness */
        html, body {
            scroll-behavior: smooth;
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Float Animation */
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        /* Pulse Glow Animation */
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 15px rgba(250, 202, 10, 0.4); }
            50% { box-shadow: 0 0 30px rgba(250, 202, 10, 0.8); }
        }
        .animate-glow {
            animation: pulseGlow 2.5s infinite;
        }

        /* Button Shine Hover Effect */
        .btn-shine {
            position: relative;
            overflow: hidden;
        }
        .btn-shine::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.35);
            transform: rotate(30deg);
            transition: all 0.75s cubic-bezier(0.19, 1, 0.22, 1);
        }
        .btn-shine:hover::after {
            left: 140%;
        }

        /* Glassmorphism & Hover Elevation */
        .card-hover-lift {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease;
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        .card-hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.12);
        }

        /* Top Scroll Progress Bar */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 4px;
            background: linear-gradient(90deg, #FACA0A, #eab308, #3b82f6);
            z-index: 999999;
            width: 0%;
            transition: width 0.1s ease-out;
            box-shadow: 0 0 10px rgba(250, 202, 10, 0.7);
        }

        /* Text Shimmer */
        @keyframes shimmerText {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .text-shimmer {
            background: linear-gradient(90deg, #1e293b 0%, #FACA0A 50%, #1e293b 100%);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shimmerText 5s linear infinite;
        }

        /* Custom Interactive Mouse Glow Cursor Follower */
        #custom-cursor-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 350px;
            height: 350px;
            margin-top: -175px;
            margin-left: -175px;
            background: radial-gradient(circle, rgba(250, 202, 10, 0.12) 0%, rgba(59, 130, 246, 0.05) 50%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 99999;
            transition: transform 0.15s ease-out, opacity 0.3s ease;
            opacity: 0;
        }

        /* World-Class 3D Gallery Stage Styles */
        .gallery-3d-stage {
            perspective: 1200px;
            overflow: hidden;
        }
        .gallery-3d-carousel {
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .gallery-3d-card {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: 1.25rem;
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.8s ease, filter 0.8s ease;
            transform-style: preserve-3d;
            cursor: pointer;
        }
        .gallery-3d-card .inner-card {
            width: 100%;
            height: 100%;
            border-radius: 1.25rem;
            overflow: hidden;
            position: relative;
            border: 2px solid rgba(250, 202, 10, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 20px rgba(250, 202, 10, 0.15);
            background: #0f172a;
        }
        .gallery-3d-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .gallery-3d-card:hover img {
            transform: scale(1.08);
        }
        .gallery-3d-card .card-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 0.75rem sm:padding:1.25rem;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.4), transparent);
            color: white;
            backdrop-filter: blur(6px);
        }
        .gallery-3d-card .card-caption h4 {
            font-weight: 800;
            font-size: 0.95rem;
            color: #FACA0A;
            letter-spacing: -0.02em;
        }
        @media (min-width: 640px) {
            .gallery-3d-card .card-caption h4 {
                font-size: 1.15rem;
            }
        }
        .gallery-3d-card .card-caption p {
            font-size: 0.75rem;
            opacity: 0.85;
            color: #cbd5e1;
        }
        @media (min-width: 640px) {
            .gallery-3d-card .card-caption p {
                font-size: 0.85rem;
            }
        }
    </style>
    
    @yield('meta')

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18339178212"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-18339178212');
    </script>
</head>
<body class="font-sans text-gray-800 bg-white relative">

    <!-- Top Scroll Progress Bar -->
    <div id="scroll-progress"></div>

    <!-- Mouse Glow Follower -->
    <div id="custom-cursor-glow"></div>

    <div class="text-center font-bold bg-gradient-to-r from-[#FACA0A] to-yellow-400 text-gray-600 py-2">
        Technical Teaching Institute
    </div>

    <!-- ================= HEADER ================= -->
    <header class="bg-white shadow-md sticky top-0 z-50">
      <div class="max-w-[1440px] mx-auto px-2.5 sm:px-4 lg:px-6 py-2 sm:py-2.5 flex items-center justify-between gap-1.5 lg:gap-2 xl:gap-4">

        <!-- Logo -->
        <a class="flex items-center gap-1.5 sm:gap-2 shrink-0" href="{{ route('home') }}">
            <img class="w-9 sm:w-11 lg:w-10 xl:w-[48px]" src="{{ asset('assets/images/logonewblackNew.webp') }}" alt="logo" loading="eager" fetchpriority="high">
            <span class="text-xs sm:text-sm lg:text-[13px] xl:text-base font-roboto font-bold text-gray-900 leading-tight tracking-tight whitespace-nowrap">
              Smart Technical<span class="hidden sm:inline lg:hidden xl:inline"> Training</span> Institute
            </span>
        </a>

        <!-- Desktop Navigation (visible on lg screens 1024px+) -->
        <nav class="hidden lg:flex items-center gap-1.5 xl:gap-3.5 2xl:gap-5 text-[11px] lg:text-[12px] xl:text-[13px] 2xl:text-sm font-semibold text-gray-700">
            <a href="{{ route('home') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Home</a>
            <a href="{{ route('about') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">About Us</a>

            <!-- Services Dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-0.5 hover:text-[#FACA0A] transition whitespace-nowrap">
                <span>Our Courses</span>
                <svg class="w-3.5 h-3.5 mt-[1px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute left-0 top-full mt-2 w-60 bg-white shadow-xl rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 border border-gray-100 py-1.5">
                <ul class="text-gray-700 text-xs xl:text-sm">
                    <li><a href="{{ route('courses.ac') }}" class="block px-4 py-2 hover:bg-[#FACA0A] hover:text-black font-medium">AC Repairing</a></li>
                    <li><a href="{{ route('courses.washing') }}" class="block px-4 py-2 hover:bg-[#FACA0A] hover:text-black font-medium">Washing Machine Repairing</a></li>
                    <li><a href="{{ route('courses.fridge') }}" class="block px-4 py-2 hover:bg-[#FACA0A] hover:text-black font-medium">Fridge Repairing</a></li>
                    <li><a href="{{ route('courses.mobile') }}" class="block px-4 py-2 hover:bg-[#FACA0A] hover:text-black font-medium">Mobile Repairing</a></li>
                    <li><a href="{{ route('courses.laptop') }}" class="block px-4 py-2 hover:bg-[#FACA0A] hover:text-black font-medium">Laptop Repairing</a></li>
                </ul>
                </div>
            </div>

            <a href="{{ route('feestructure') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Fee Structure</a>
            <a href="{{ route('blog.index') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Blog</a>
            <a href="{{ route('gallery') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Gallery</a>
            <a href="{{ route('admission') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Student Admission</a>
            <a href="{{ route('contact') }}" class="hover:text-[#FACA0A] transition whitespace-nowrap">Contact</a>
        </nav>

        <!-- Right Actions (Always visible, responsive & never overflows) -->
        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
          <a href="tel:7870516006" class="hidden sm:flex items-center justify-center gap-1 border border-[#FACA0A] text-yellow-800 bg-yellow-50/70 hover:bg-[#FACA0A] hover:text-black px-2 sm:px-2.5 xl:px-3.5 py-1 sm:py-1.5 rounded-full font-semibold transition whitespace-nowrap shadow-xs text-[11px] xl:text-xs">
            <i class="fa-solid fa-phone text-[#FACA0A]"></i> <span class="hidden xl:inline">7870516006</span>
          </a>
          <a href="tel:7870516006" class="sm:hidden flex items-center justify-center w-7 h-7 rounded-full border border-[#FACA0A] text-yellow-800 bg-yellow-50" aria-label="Call Us">
            <i class="fa-solid fa-phone text-[10px] text-yellow-700"></i>
          </a>
          <a href="{{ route('student.login') }}" class="flex text-[11px] sm:text-xs text-white bg-blue-600 hover:bg-blue-700 px-2 sm:px-3 py-1 sm:py-1.5 rounded-lg font-semibold transition shadow-xs whitespace-nowrap">
            Student Login
          </a>
          <a href="{{ route('admin.login') }}" class="flex items-center gap-1 text-[11px] sm:text-xs text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 border border-slate-300 px-2 sm:px-2.5 py-1 sm:py-1.5 rounded-lg font-semibold transition shadow-xs whitespace-nowrap">
            <i class="fa-solid fa-user-shield text-slate-500 text-[10px] sm:text-xs"></i> <span>Admin</span>
          </a>
          
          <!-- Mobile Menu Button (visible on screens < 1024px) -->
          <button class="lg:hidden p-1 text-2xl text-[#FACA0A] hover:text-yellow-600 shrink-0 focus:outline-none leading-none ml-0.5" onclick="openMenu()" aria-label="Toggle Menu">
            ☰
          </button>
        </div>
      </div>
    </header>

    <!-- ================= MOBILE SIDE MENU ================= -->
    <div id="mobileMenu" class="fixed inset-0 z-50 hidden">
      <!-- Overlay -->
      <div class="absolute inset-0 bg-black/50 backdrop-blur-xs" onclick="closeMenu()"></div>

      <!-- Drawer -->
      <div class="absolute right-0 top-0 h-full w-[85vw] max-w-xs sm:w-80 bg-white shadow-2xl p-6 overflow-y-auto animate-slide-in flex flex-col justify-between">
        <div>
          <div class="flex justify-between items-center mb-6 border-b pb-4">
              <a class="flex items-center gap-2" href="{{ route('home') }}">
                  <div class="w-[45px] shrink-0">
                    <img class="w-full" src="{{ asset('assets/images/logonewblackNew.webp') }}" alt="logo">
                  </div>
                  <span class="text-sm sm:text-base font-roboto font-bold drop-shadow-md leading-snug">
                    Smart Technical Training Institute
                  </span>
              </a>
            <button onclick="closeMenu()" class="text-2xl font-bold text-gray-500 hover:text-red-500">✕</button>
          </div>

          <!-- Links -->
          <nav class="flex flex-col gap-4 text-sm font-semibold text-gray-700">
            <a href="{{ route('home') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Home</a>
            <a href="{{ route('about') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">About Us</a>

            <!-- Services Dropdown (Mobile) -->
            <div>
              <button onclick="toggleServices()" class="flex w-full items-center justify-between text-left hover:text-[#FACA0A] transition py-1">
                <span>Our Courses</span>
                <svg id="serviceArrow" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </button>

              <div id="servicesMenu" class="mt-2 ml-3 hidden flex-col gap-2 text-gray-600 text-xs sm:text-sm">
                <a href="{{ route('courses.ac') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">AC Repairing</a>
                <a href="{{ route('courses.washing') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Washing Machine Repairing</a>
                <a href="{{ route('courses.fridge') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Fridge Repairing</a>
                <a href="{{ route('courses.mobile') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Mobile Repairing</a>
                <a href="{{ route('courses.laptop') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Laptop Repairing</a>
              </div>
            </div>

            <a href="{{ route('feestructure') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Fee Structure</a>
            <a href="{{ route('blog.index') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Blog</a>
            <a href="{{ route('gallery') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Gallery</a>
            <a href="{{ route('admission') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Student Admission</a>
            <a href="{{ route('contact') }}" onclick="closeMenu()" class="hover:text-[#FACA0A] transition py-1">Contact</a>
            
            <div class="pt-4 border-t border-gray-100 space-y-2.5">
              <a href="{{ route('student.login') }}" onclick="closeMenu()" class="flex items-center justify-center gap-2 text-white bg-blue-600 hover:bg-blue-700 py-2.5 rounded-xl font-semibold text-xs shadow-xs transition">
                <i class="fa-solid fa-user-graduate"></i> Student Login
              </a>
              <a href="{{ route('admin.login') }}" onclick="closeMenu()" class="flex items-center justify-center gap-2 text-slate-700 bg-slate-100 hover:bg-slate-200 py-2.5 rounded-xl font-semibold text-xs border border-slate-200 transition">
                <i class="fa-solid fa-user-shield text-slate-600"></i> Admin Portal
              </a>
            </div>
          </nav>
        </div>

        <div class="mt-8 pt-4 border-t border-gray-100">
          <a href="tel:7870516006" class="flex items-center justify-center gap-2 text-center bg-[#FACA0A] text-black py-3 rounded-full font-bold shadow-md hover:bg-yellow-400 transition text-sm">
            <i class="fa-solid fa-phone"></i> Call Now: 7870516006
          </a>
        </div>
      </div>
    </div>

    <!-- MAIN CONTENT -->
    <main id="main-container">
        @yield('content')
    </main>

    <!-- Floating Contact Buttons -->
    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-[9999] flex flex-col gap-3">
        <a href="https://wa.me/917870516006" target="_blank" aria-label="WhatsApp Us" class="group w-12 h-12 sm:w-14 sm:h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-xl transition-all duration-300 hover:scale-110">
            <i class="fa-brands fa-whatsapp text-white text-2xl sm:text-3xl"></i>
        </a>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 pt-16 sm:pt-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 pb-12 sm:pb-16 border-b border-gray-700">
          <div>
            <div class="flex gap-1 items-center">
              <img class="w-[80px]" src="{{ asset('assets/images/logonewblackNew.webp') }}" alt="logo">
              <h3 class="text-2xl font-bold text-white mb-4">
                Smart Technical Training Institute
              </h3>
            </div>
            <p class="text-sm leading-relaxed mt-2">
              Professional training institute for AC, Washing Machine, LED TV and
              Mobile Repairing with 100% practical exposure.
            </p>

            <div class="flex gap-4 mt-6">
              <a href="#" target="_blank" class="footer-icon text-xl hover:text-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
              <a href="#" target="_blank" class="footer-icon text-xl hover:text-pink-600 transition"><i class="fab fa-instagram"></i></a>
              <a href="#" target="_blank" class="footer-icon text-xl hover:text-red-600 transition"><i class="fab fa-youtube"></i></a>
              <a href="https://wa.me/917870516006" target="_blank" class="footer-icon text-xl hover:text-green-500 transition"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div>

          <div>
            <h4 class="footer-title font-bold pb-6 text-white text-lg">Courses</h4>
            <ul class="space-y-3 text-sm">
              <li><a href="{{ route('courses.ac') }}" class="footer-link hover:text-[#FACA0A]">AC Repairing Course</a></li>
              <li><a href="{{ route('courses.washing') }}" class="footer-link hover:text-[#FACA0A]">Washing Machine Repairing</a></li>
              <li><a href="{{ route('courses.fridge') }}" class="footer-link hover:text-[#FACA0A]">Fridge Repairing</a></li>
              <li><a href="{{ route('courses.mobile') }}" class="footer-link hover:text-[#FACA0A]">Mobile Phone Repairing</a></li>
              <li><a href="{{ route('courses.laptop') }}" class="footer-link hover:text-[#FACA0A]">Laptop Repairing</a></li>
            </ul>
          </div>

          <div>
            <h4 class="footer-title font-bold pb-6 text-white text-lg">Quick Links</h4>
            <ul class="space-y-3 text-sm">
              <li><a href="{{ route('home') }}" class="footer-link hover:text-[#FACA0A]">Home</a></li>
              <li><a href="{{ route('about') }}" class="footer-link hover:text-[#FACA0A]">About Us</a></li>
              <li><a href="{{ route('feestructure') }}" class="footer-link hover:text-[#FACA0A]">Fee Structure</a></li>
              <li><a href="{{ route('blog.index') }}" class="footer-link hover:text-[#FACA0A]">Blog</a></li>
              <li><a href="{{ route('gallery') }}" class="footer-link hover:text-[#FACA0A]">Gallery</a></li>
              <li><a href="{{ route('admission') }}" class="footer-link hover:text-[#FACA0A]">Student Admission</a></li>
              <li><a href="{{ route('contact') }}" class="footer-link hover:text-[#FACA0A]">Contact</a></li>
              <li><a href="{{ route('sitemap') }}" class="footer-link hover:text-[#FACA0A]">Sitemap</a></li>
            </ul>
          </div>

          <div>
            <h4 class="footer-title font-bold pb-6 text-white text-lg">Contact Us</h4>
            <ul class="space-y-3 text-sm">
              <li>Near Hi-Tech Hospital saguna more Balaji Nagar new Tarachak danapur patna bihar 801503</li>
              <li>📞 <a href="tel:7870516006" class="footer-link hover:text-[#FACA0A]">7870516006</a></li>
              <li>✉️ <a href="mailto:info@technicalcentre.com" class="footer-link hover:text-[#FACA0A]">info@technicalcentre.com</a></li>
              <li>🕒 Mon – Sat: 9:00 AM – 7:00 PM</li>
            </ul>
          </div>
        </div>

        <div class="py-6 text-center text-sm text-gray-400">
          © {{ date('Y') }} Technical Teaching Centre. All Rights Reserved. <a class="font-bold hover:underline" target="_blank" href="https://startupwebsupport.com/">Designed and Developed by Startup Web Support.</a>
        </div>
      </div>
    </footer>

    <!-- Enquiry Popup -->
    <div id="enquiryPopup" class="fixed inset-0 bg-black/70 z-[99999] hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative p-8">
            <button id="closePopup" class="absolute top-4 right-4 text-2xl font-bold text-gray-500 hover:text-red-500">&times;</button>
            <h3 class="text-2xl font-bold mb-6 text-center">Enroll Now</h3>
            <form id="popupEnquiryForm" class="space-y-4">
                <input type="text" id="popupName" placeholder="Full Name" class="w-full border border-gray-300 rounded-lg px-4 py-3" required>
                <input type="tel" id="popupPhone" placeholder="Mobile Number" class="w-full border border-gray-300 rounded-lg px-4 py-3" required>
                <input type="text" id="popupCity" placeholder="City" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                <select id="popupCourse" class="w-full border border-gray-300 rounded-lg px-4 py-3" required>
                    <option value="">Select Course</option>
                    <option>AC Repairing Training</option>
                    <option>Refrigerator Repairing Training</option>
                    <option>Washing Machine Repairing Training</option>
                    <option>Mobile Repairing Training</option>
                    <option>Laptop Repairing Training</option>
                </select>
                <textarea id="popupMessage" rows="4" placeholder="Write your query..." class="w-full border border-gray-300 rounded-lg px-4 py-3"></textarea>
                <button type="submit" class="w-full bg-[#FACA0A] hover:bg-yellow-500 text-black py-3 rounded-lg font-semibold">
                    Submit Enquiry
                </button>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const popup = document.getElementById("enquiryPopup");
        const closeBtn = document.getElementById("closePopup");
        if (popup && !sessionStorage.getItem("popupShown")) {
            setTimeout(() => {
                popup.classList.remove("hidden");
                popup.classList.add("flex");
            }, 1500);
            sessionStorage.setItem("popupShown", "true");
        }
        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                popup.classList.add("hidden");
                popup.classList.remove("flex");
            });
        }
        if (popup) {
            popup.addEventListener("click", (e) => {
                if (e.target === popup) {
                    popup.classList.add("hidden");
                    popup.classList.remove("flex");
                }
            });
        }
        const enquiryForm = document.getElementById("popupEnquiryForm");
        if (enquiryForm) {
            enquiryForm.addEventListener("submit", function(e) {
                e.preventDefault();
                const name = document.getElementById("popupName").value;
                const phone = document.getElementById("popupPhone").value;
                const city = document.getElementById("popupCity").value;
                const course = document.getElementById("popupCourse").value;
                const message = document.getElementById("popupMessage").value;
                const whatsappText = `🎓 New Popup Enquiry\n👤 Name: ${name}\n📞 Mobile: ${phone}\n🏙️ City: ${city}\n📚 Course: ${course}\n📝 Message:\n${message}`;
                window.open(`https://wa.me/917870516006?text=${encodeURIComponent(whatsappText)}`, "_blank");
                popup.classList.add("hidden");
                popup.classList.remove("flex");
                this.reset();
            });
        }
    });
    </script>

    <!-- AOS Animation Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 900,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 60,
                    delay: 50
                });
            }

            // 2. Scroll Progress Bar
            const progressBar = document.getElementById('scroll-progress');
            window.addEventListener('scroll', () => {
                const totalHeight = document.documentElement.scrollHeight - window.innerHeight;
                if (totalHeight > 0) {
                    const progress = (window.scrollY / totalHeight) * 100;
                    progressBar.style.width = progress + '%';
                }
            });

            // 3. Custom Interactive Cursor Glow
            const cursorGlow = document.getElementById('custom-cursor-glow');
            if (cursorGlow && window.innerWidth > 768) {
                document.addEventListener('mousemove', (e) => {
                    cursorGlow.style.opacity = '1';
                    cursorGlow.style.transform = `translate3d(${e.clientX}px, ${e.clientY}px, 0)`;
                });
                document.addEventListener('mouseleave', () => {
                    cursorGlow.style.opacity = '0';
                });
            }

            // 4. Interactive 3D Card Tilt Effect
            const tiltCards = document.querySelectorAll('.card-hover-lift');
            tiltCards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = (y - centerY) / 12;
                    const rotateY = (centerX - x) / 12;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px) scale(1)';
                });
            });

            // 5. World-Class 3D Gallery Stage Engine
            const cards3d = document.querySelectorAll('.gallery-3d-card');
            const prev3dBtn = document.getElementById('prev3dBtn');
            const next3dBtn = document.getElementById('next3dBtn');
            const dotsContainer = document.getElementById('dots3dContainer');

            if (cards3d.length > 0) {
                let activeIndex = 0;
                const totalCards = cards3d.length;

                // Create Dots
                if (dotsContainer) {
                    dotsContainer.innerHTML = '';
                    cards3d.forEach((_, idx) => {
                        const dot = document.createElement('button');
                        dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${idx === 0 ? 'bg-yellow-400 w-8' : 'bg-white/40 hover:bg-white/80'}`;
                        dot.addEventListener('click', () => update3dGallery(idx));
                        dotsContainer.appendChild(dot);
                    });
                }

                function update3dGallery(newIndex) {
                    activeIndex = (newIndex + totalCards) % totalCards;
                    const radius = window.innerWidth < 480 ? 95 : (window.innerWidth < 640 ? 140 : (window.innerWidth < 1024 ? 220 : 290));

                    cards3d.forEach((card, i) => {
                        let offset = i - activeIndex;
                        if (offset > totalCards / 2) offset -= totalCards;
                        if (offset < -totalCards / 2) offset += totalCards;

                        const angle = (offset * (360 / totalCards));
                        const rad = (angle * Math.PI) / 180;
                        const translateZ = Math.cos(rad) * radius - radius;
                        const translateX = Math.sin(rad) * radius * 1.1;
                        const opacity = Math.abs(offset) > 2 ? 0 : Math.pow(0.7, Math.abs(offset));
                        const rotateY = -angle;

                        card.style.transform = `translateX(${translateX}px) translateZ(${translateZ}px) rotateY(${rotateY}deg)`;
                        card.style.opacity = opacity;
                        card.style.zIndex = Math.round(100 - Math.abs(offset) * 10);
                        card.style.filter = offset === 0 ? 'none' : 'brightness(0.6) blur(1px)';
                    });

                    // Update Dots
                    if (dotsContainer) {
                        Array.from(dotsContainer.children).forEach((dot, idx) => {
                            if (idx === activeIndex) {
                                dot.className = 'w-8 h-3 rounded-full bg-yellow-400 transition-all duration-300 shadow-md shadow-yellow-400/50';
                            } else {
                                dot.className = 'w-3 h-3 rounded-full bg-white/40 hover:bg-white/80 transition-all duration-300';
                            }
                        });
                    }
                }

                // Initial render
                update3dGallery(0);

                // Controls
                if (prev3dBtn) prev3dBtn.addEventListener('click', () => update3dGallery(activeIndex - 1));
                if (next3dBtn) next3dBtn.addEventListener('click', () => update3dGallery(activeIndex + 1));

                // Card Click
                cards3d.forEach((card, idx) => {
                    card.addEventListener('click', () => update3dGallery(idx));
                });

                // Auto rotate
                let autoTimer = setInterval(() => update3dGallery(activeIndex + 1), 4500);
                const stage = document.querySelector('.gallery-3d-stage');
                if (stage) {
                    stage.addEventListener('mouseenter', () => clearInterval(autoTimer));
                    stage.addEventListener('mouseleave', () => {
                        clearInterval(autoTimer);
                        autoTimer = setInterval(() => update3dGallery(activeIndex + 1), 4500);
                    });
                }
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
