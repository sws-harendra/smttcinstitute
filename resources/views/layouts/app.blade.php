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
    
    @yield('meta')
</head>
<body class="font-sans text-gray-800 bg-white">

    <div class="text-center font-bold bg-gradient-to-r from-[#FACA0A] to-yellow-400 text-gray-600 py-2">
        Technical Teaching Institute
    </div>

    <!-- ================= HEADER ================= -->
    <header class="bg-white shadow-md sticky top-0 z-50">
      <div class="max-w-[1320px] mx-auto px-2 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a class="flex items-center gap-2" href="{{ route('home') }}">
            <img class="w-[60px]" src="{{ asset('assets/images/logonewblackNew.webp') }}" alt="logo" loading="eager" fetchpriority="high">
            <span class="text-2xl font-roboto font-semibold drop-shadow-md">
              Smart Technical Training institute
            </span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold text-gray-700">
            <a href="{{ route('home') }}" class="hover:text-[#FACA0A] transition">Home</a>
            <a href="{{ route('about') }}" class="hover:text-[#FACA0A] transition">About Us</a>

            <!-- Services Dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-[#FACA0A] transition">
                Our Courses
                <svg class="w-4 h-4 mt-[2px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute left-0 top-full mt-4 w-64 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                <ul class="py-3 text-gray-700">
                    <li><a href="{{ route('courses.ac') }}" class="block px-5 py-2 hover:bg-[#FACA0A]">AC Repairing</a></li>
                    <li><a href="{{ route('courses.washing') }}" class="block px-5 py-2 hover:bg-[#FACA0A]">Washing Machine Repairing</a></li>
                    <li><a href="{{ route('courses.fridge') }}" class="block px-5 py-2 hover:bg-[#FACA0A]">Fridge Repairing</a></li>
                    <li><a href="{{ route('courses.mobile') }}" class="block px-5 py-2 hover:bg-[#FACA0A]">Mobile Repairing</a></li>
                    <li><a href="{{ route('courses.laptop') }}" class="block px-5 py-2 hover:bg-[#FACA0A]">Laptop Repairing</a></li>
                </ul>
                </div>
            </div>

            <a href="{{ route('feestructure') }}" class="hover:text-[#FACA0A] transition">Fee Structure</a>
            <a href="{{ route('blog.index') }}" class="hover:text-[#FACA0A] transition">Blog</a>
            <a href="{{ route('gallery') }}" class="hover:text-[#FACA0A] transition">Gallery</a>
            <a href="{{ route('contact') }}" class="hover:text-[#FACA0A] transition">Contact</a>
        </nav>

        <!-- Right Actions -->
        <div class="hidden md:flex items-center gap-3">
          <a href="tel:7091756006" class="flex items-center gap-2 border border-[#FACA0A] text-[#FACA0A] px-4 py-2 rounded-full font-semibold hover:bg-[#FACA0A] hover:text-white transition">
            📞 7091756006
          </a>
          <a href="{{ route('admin.login') }}" class="text-xs text-gray-500 hover:text-black border border-gray-300 px-2 py-1 rounded">
            Admin
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden text-2xl text-[#FACA0A]" onclick="openMenu()">
          ☰
        </button>
      </div>
    </header>

    <!-- ================= MOBILE SIDE MENU ================= -->
    <div id="mobileMenu" class="fixed inset-0 z-50 hidden">
      <!-- Overlay -->
      <div class="absolute inset-0 bg-black/40" onclick="closeMenu()"></div>

      <!-- Drawer -->
      <div class="absolute right-0 top-0 h-full w-72 bg-white shadow-xl p-6 animate-slide-in">
        <div class="flex justify-between items-center mb-6">
            <a class="flex items-center gap-2" href="{{ route('home') }}">
                <div class="w-[60px]">
                  <img class="w-full" src="{{ asset('assets/images/logonewblackNew.webp') }}" alt="logo">
                </div>
                <span class="text-xl font-roboto font-semibold drop-shadow-md">
                  Smart Technical Training Institute
                </span>
            </a>
          <button onclick="closeMenu()" class="text-2xl">✕</button>
        </div>

        <!-- Links -->
        <nav class="flex flex-col gap-5 text-sm font-semibold text-gray-700">
          <a href="{{ route('home') }}" onclick="closeMenu()">Home</a>
          <a href="{{ route('about') }}" onclick="closeMenu()">About Us</a>

          <!-- Services Dropdown (Mobile) -->
          <div>
            <button onclick="toggleServices()" class="flex w-full items-center justify-between text-left hover:text-[#FACA0A] transition">
              <span>Our Courses</span>
              <svg id="serviceArrow" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <div id="servicesMenu" class="mt-3 ml-3 hidden flex-col gap-2 text-gray-600">
              <a href="{{ route('courses.ac') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">AC Repairing</a>
              <a href="{{ route('courses.washing') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Washing Machine Repairing</a>
              <a href="{{ route('courses.fridge') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Fridge Repairing</a>
              <a href="{{ route('courses.mobile') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Mobile Repairing</a>
              <a href="{{ route('courses.laptop') }}" onclick="closeMenu()" class="block py-1 hover:text-[#FACA0A]">Laptop Repairing</a>
            </div>
          </div>

          <a href="{{ route('feestructure') }}" onclick="closeMenu()">Fee Structure</a>
          <a href="{{ route('blog.index') }}" onclick="closeMenu()">Blog</a>
          <a href="{{ route('gallery') }}" onclick="closeMenu()">Gallery</a>
          <a href="{{ route('contact') }}" onclick="closeMenu()">Contact</a>
        </nav>

        <div class="mt-8 space-y-4">
          <a href="tel:7091756006" class="block text-center border border-[#FACA0A] text-[#FACA0A] py-3 rounded-full font-semibold">
            📞 Call Now
          </a>
        </div>
      </div>
    </div>

    <!-- MAIN CONTENT -->
    <main id="main-container">
        @yield('content')
    </main>

    <!-- Floating Contact Buttons -->
    <div class="fixed bottom-5 right-5 z-[9999] flex flex-col gap-3">
        <a href="https://wa.me/918800414848" target="_blank" class="group w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-xl transition-all duration-300 hover:scale-110">
            <i class="fa-brands fa-whatsapp text-white text-3xl"></i>
        </a>
    </div>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 pt-20">
      <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-12 pb-16 border-b border-gray-700">
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
              <a href="https://wa.me/918800414848" target="_blank" class="footer-icon text-xl hover:text-green-500 transition"><i class="fab fa-whatsapp"></i></a>
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
              <li><a href="{{ route('contact') }}" class="footer-link hover:text-[#FACA0A]">Contact</a></li>
              <li><a href="{{ route('sitemap') }}" class="footer-link hover:text-[#FACA0A]">Sitemap</a></li>
            </ul>
          </div>

          <div>
            <h4 class="footer-title font-bold pb-6 text-white text-lg">Contact Us</h4>
            <ul class="space-y-3 text-sm">
              <li>Near Hi-Tech Hospital saguna more Balaji Nagar new Tarachak danapur patna bihar 801503</li>
              <li>📞 <a href="tel:7091756006" class="footer-link hover:text-[#FACA0A]">7091756006</a></li>
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
                window.open(`https://wa.me/918800414848?text=${encodeURIComponent(whatsappText)}`, "_blank");
                popup.classList.add("hidden");
                popup.classList.remove("flex");
                this.reset();
            });
        }
    });
    </script>

    @yield('scripts')
</body>
</html>
