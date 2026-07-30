@extends('layouts.app')

@section('title', 'Contact Us | Smart Technical Training Institute')

@section('meta')
    <meta name="keywords" content="AC mechanic course Patna, washing machine mechanic course Patna, fridge mechanic course in Patna, mobile repairing course in Patna, laptop repairing course in Patna" />
    <meta name="description" content="Learn fridge mechanic course in Patna and mobile repairing course in Patna with expert training, practical skills, and certification for a successful career.">
    <link rel="canonical" href="{{ route('contact') }}" />
@endsection

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-yellow-500 to-[#FACA0A] py-12 sm:py-20 text-black text-center px-4">
  <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold">Contact Us</h1>
  <p class="mt-2 sm:mt-4 text-sm sm:text-base text-black font-medium">We’re here to guide your technical career</p>
</section>

<!-- CONTACT SECTION -->
<section class="py-12 sm:py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">

    <!-- LEFT INFO -->
    <div>
        <div class="bg-gradient-to-br from-gray-900 to-black text-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl">
            <span class="inline-block bg-[#FACA0A]/20 text-[#FACA0A] px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold mb-4">
                Contact Information
            </span>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">Get In Touch</h2>
            <p class="text-gray-300 text-sm sm:text-base mb-6 sm:mb-8 leading-relaxed">
                Have questions about our training programs? Contact us today and our team will help you choose the right course.
            </p>
            <div class="space-y-4">
                <div class="flex items-start gap-4 bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#FACA0A] rounded-lg flex items-center justify-center text-black text-lg sm:text-xl shrink-0">📍</div>
                    <div>
                        <h4 class="font-semibold text-base sm:text-lg">Institute Address</h4>
                        <p class="text-gray-300 text-xs sm:text-sm leading-relaxed mt-1">Near Hi-Tech Hospital Saguna More, Balaji Nagar, New Tarachak, Danapur, Patna, Bihar 801503</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#FACA0A] rounded-lg flex items-center justify-center text-black text-lg sm:text-xl shrink-0">📞</div>
                    <div>
                        <h4 class="font-semibold text-base sm:text-lg">Call Us</h4>
                        <a href="tel:7870516006" class="text-gray-300 hover:text-[#FACA0A] transition text-xs sm:text-sm mt-1 block">+91 78705 16006</a>
                    </div>
                </div>
                <div class="flex items-start gap-4 bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 bg-[#FACA0A] rounded-lg flex items-center justify-center text-black text-lg sm:text-xl shrink-0">✉️</div>
                    <div>
                        <h4 class="font-semibold text-base sm:text-lg">Email Address</h4>
                        <p class="text-gray-300 text-xs sm:text-sm mt-1">info@technicalcentre.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="bg-white p-6 sm:p-8 md:p-10 rounded-2xl shadow-xl border border-gray-100">
        <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Send Us a Message</h3>
        <form id="contactPageForm" class="space-y-4">
            <div>
                <label class="block text-xs sm:text-sm font-semibold mb-1.5">Full Name</label>
                <input type="text" id="contactName" placeholder="Your Name" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#FACA0A]" required>
            </div>
            <div>
                <label class="block text-xs sm:text-sm font-semibold mb-1.5">Mobile Number</label>
                <input type="tel" id="contactPhone" placeholder="Your Phone Number" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#FACA0A]" required>
            </div>
            <div>
                <label class="block text-xs sm:text-sm font-semibold mb-1.5">Select Course</label>
                <select id="contactCourse" class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#FACA0A]" required>
                    <option value="">Choose Course</option>
                    <option>AC Repairing Course</option>
                    <option>Washing Machine Repairing Course</option>
                    <option>Fridge Repairing Course</option>
                    <option>Mobile Repairing Course</option>
                    <option>Laptop Repairing Course</option>
                </select>
            </div>
            <div>
                <label class="block text-xs sm:text-sm font-semibold mb-1.5">Message</label>
                <textarea id="contactMessage" rows="4" placeholder="Your Query..." class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#FACA0A]"></textarea>
            </div>
            <button type="submit" class="w-full bg-[#FACA0A] hover:bg-yellow-500 text-black py-3.5 sm:py-4 rounded-xl font-bold shadow-lg transition text-sm sm:text-base">
                Send Query via WhatsApp
            </button>
        </form>
    </div>

  </div>
</section>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const contactForm = document.getElementById("contactPageForm");
    if (contactForm) {
        contactForm.addEventListener("submit", function(e) {
            e.preventDefault();
            const name = document.getElementById("contactName").value;
            const phone = document.getElementById("contactPhone").value;
            const course = document.getElementById("contactCourse").value;
            const message = document.getElementById("contactMessage").value;
            const whatsappText = `🎓 Contact Query\n👤 Name: ${name}\n📞 Mobile: ${phone}\n📚 Course: ${course}\n📝 Message:\n${message}`;
            window.open(`https://wa.me/917870516006?text=${encodeURIComponent(whatsappText)}`, "_blank");
            this.reset();
        });
    }
});
</script>
@endsection
