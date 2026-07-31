@extends('layouts.app')

@section('title', 'Laptop Repairing Course in Patna | Chip Level Laptop Training')

@section('meta')
    <meta name="keywords" content="Laptop Repairing Course in Patna, Laptop Repairing Institute in Patna, laptop repair training Patna, chip level laptop repairing Patna, computer hardware course Patna" />
    <meta name="description" content="Master laptop hardware & software repairing in Patna. Practical training on motherboard testing, power circuits, screen replacement, BIOS & OS troubleshooting.">
    <link rel="canonical" href="{{ route('courses.laptop') }}" />
@endsection

@section('content')

<!-- 1. HERO HEADER SECTION -->
<section class="relative bg-gradient-to-b from-amber-500/10 via-white to-slate-50 py-16 sm:py-24 border-b border-slate-200/60 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <!-- Text Column -->
      <div class="lg:col-span-7" data-aos="fade-right" data-aos-duration="800">
        <div class="inline-flex items-center gap-2 bg-[#FACA0A] text-slate-900 font-extrabold px-4 py-1.5 rounded-full text-sm sm:text-base mb-6 shadow-sm font-cursive tracking-wide">
          <i class="fa-solid fa-certificate"></i> Practical & Skill Based Training
        </div>
        
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 leading-tight mb-6 tracking-tight">
          Laptop Repairing Course in <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-yellow-500">Patna</span>
        </h1>

        <div class="space-y-4 text-slate-700 text-base sm:text-lg leading-relaxed font-medium mb-8">
          <p>
            The <b>Laptop Repairing Course</b> offered by our <b>Laptop Repairing Institute in Patna</b> is a practical and skill based training program created for students who want to learn real laptop repairing work. This course is focused on hands on learning where students understand how laptops work how problems develop and how to repair devices using proper professional methods.
          </p>
          <p>
            Laptops are used everywhere today in offices colleges businesses and homes. Because of this laptop repairing has become a high demand skill. This <b>Laptop Repairing Course</b> is structured to cover both basic and advanced laptop repairing concepts including hardware identification fault diagnosis and servicing methods. Students learn through real laptops and live repair situations that are commonly seen in service centers.
          </p>
          <p>
            Training starts with understanding important laptop parts like motherboard power supply display keyboard battery and cooling system. As the course moves forward students learn to handle common laptop problems like no power charging issue display fault overheating and performance related issues. Strong focus is given on correct fault diagnosis so students can find the exact problem before starting any repair work.
          </p>
          <p class="text-slate-800 font-bold bg-white/80 p-3 rounded-xl border border-slate-200 inline-block">
            At our Laptop Repairing Institute in Patna the learning method is practical first. Students work on real laptops under proper guidance which helps them gain confidence to handle different brands and models. The course is taught step by step so even beginners can learn without confusion. Along with hardware repairing students are also introduced to basic software related work required in laptop servicing.
          </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
          <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-900 bg-[#FACA0A] rounded-full hover:bg-yellow-400 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
            Enquire Now <i class="fa-solid fa-arrow-right ml-2"></i>
          </a>
          <a href="tel:7870516006" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-700 bg-white border border-slate-300 rounded-full hover:bg-slate-50 transition-all duration-300">
            <i class="fa-solid fa-phone text-[#FACA0A] mr-2"></i> Call 7870516006
          </a>
        </div>
      </div>

      <!-- Right Visual Component -->
      <div class="lg:col-span-5" data-aos="fade-left" data-aos-duration="800">
        <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xl relative">
          <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 bg-[#FACA0A] text-slate-900 rounded-2xl flex items-center justify-center text-2xl font-bold">
              <i class="fa-solid fa-laptop-code"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-slate-900">Laptop Hardware Lab</h3>
              <p class="text-slate-500 text-sm font-medium">Motherboard & Chip Level Practice</p>
            </div>
          </div>
          
          <div class="space-y-4 text-slate-700 text-sm font-medium border-t border-slate-100 pt-6">
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Motherboard Power Supply & Circuit Faults</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Screen, Keyboard, Battery & Cooling Replacement</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Component Testing, Multimeter & ESD Safety</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>OS Setup, Drivers & Basic Software Servicing</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 2. WHO SHOULD JOIN THIS COURSE (Card-Free Animated Feature Flow) -->
<section class="py-16 sm:py-24 bg-slate-50 border-b border-slate-200/60 relative">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    
    <div class="mb-14" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-xs font-extrabold px-3 py-1 rounded-full mb-3 uppercase tracking-wider">
        <i class="fa-solid fa-users"></i> Target Audience
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-3">Who Should Join This Course</h2>
      <p class="text-slate-600 font-medium text-base sm:text-lg">Recommended for 10th/12th pass, ITI/Diploma, college students & working technicians.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      
      <!-- Flow Item 1 -->
      <div class="group relative pl-6 border-l-2 border-yellow-300 hover:border-yellow-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
        <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-[#FACA0A] group-hover:text-slate-900 transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-user-graduate"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          10th, 12th & ITI Students
          <i class="fa-solid fa-arrow-right text-xs text-yellow-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          This Laptop Repairing Course is suitable for anyone who wants to build a career in the electronics or computer hardware service field. No advanced technical background is required. It is recommended for students who have passed tenth or twelfth and ITI/diploma students who want real practical laptop repairing experience.
        </p>
      </div>

      <!-- Flow Item 2 -->
      <div class="group relative pl-6 border-l-2 border-blue-300 hover:border-blue-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-screwdriver-wrench"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          College Students & Job Seekers
          <i class="fa-solid fa-arrow-right text-xs text-blue-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          College students interested in part time or full time repair work will find this course useful. Job seekers looking for stable employment opportunities can build a career through this training. Working technicians who want to upgrade their laptop repairing skills can improve their knowledge here.
        </p>
      </div>

      <!-- Flow Item 3 -->
      <div class="group relative pl-6 border-l-2 border-green-300 hover:border-green-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
        <div class="w-10 h-10 rounded-xl bg-green-100 text-green-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-green-500 group-hover:text-white transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-briefcase"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          Entrepreneurs & Shop Owners
          <i class="fa-solid fa-arrow-right text-xs text-green-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          Entrepreneurs planning to open a laptop or computer repair shop can also benefit from this course. If you have interest in technology troubleshooting and practical work then this course is a strong career option. Laptop repairing offers steady earning opportunities with long term growth potential.
        </p>
      </div>

    </div>

    <!-- Summary Callout -->
    <div class="mt-10 p-6 rounded-2xl bg-white border border-slate-200 text-slate-800 font-medium text-base sm:text-lg" data-aos="fade-up">
      By joining our Laptop Repairing Institute in Patna students gain hands on skills technical confidence and the ability to work independently. This training helps them compete confidently in the laptop repairing market.
    </div>

  </div>
</section>

<!-- 3. WHAT YOU WILL LEARN (Interactive Vertical Stepper Timeline) -->
<section class="py-16 sm:py-24 bg-white border-b border-slate-100 relative">
  <div class="max-w-5xl mx-auto px-4 sm:px-6">
    <div class="mb-14" data-aos="fade-up">
      <div class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 text-xs font-extrabold px-3 py-1 rounded-full mb-3 uppercase tracking-wider">
        <i class="fa-solid fa-graduation-cap"></i> Practical Curriculum Modules
      </div>
      <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">What You Will Learn</h2>
      <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-medium">
        At our Laptop Repairing Institute in Patna the <b>Laptop Repairing Course</b> is designed to give students complete practical knowledge needed to handle real laptop repair work. The main focus of training is on hands on skills that are actually used in service centers and independent laptop repair businesses.
      </p>
    </div>

    <!-- Timeline Stepper Container -->
    <div class="relative pl-6 sm:pl-10 space-y-10 border-l-2 border-yellow-200">
      
      <!-- Module 01 -->
      <div class="group relative" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute -left-[31px] sm:-left-[47px] top-0 w-10 h-10 rounded-full bg-yellow-100 border-4 border-white text-yellow-800 flex items-center justify-center font-bold text-sm group-hover:bg-[#FACA0A] group-hover:text-slate-900 group-hover:scale-110 transition-all duration-300 shadow-sm">
          01
        </div>
        <div class="pl-2">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 px-3 py-0.5 rounded-full uppercase tracking-wider font-cursive">Module 01</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Fault Finding and Troubleshooting
              <i class="fa-solid fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-amber-500"></i>
            </h3>
          </div>
          <p class="text-slate-600 leading-relaxed font-medium text-base sm:text-lg">
            Students learn step by step methods to diagnose laptop problems in the right way. Training includes common issues like no power laptop not turning on charging failure no display overheating sudden shutdown and performance related problems. Instead of guessing students are trained to use logical troubleshooting methods to find the exact cause of the fault. This helps in doing professional repairs with better accuracy and confidence.
          </p>
        </div>
      </div>

      <!-- Module 02 -->
      <div class="group relative" data-aos="fade-up" data-aos-delay="200">
        <div class="absolute -left-[31px] sm:-left-[47px] top-0 w-10 h-10 rounded-full bg-yellow-100 border-4 border-white text-yellow-800 flex items-center justify-center font-bold text-sm group-hover:bg-[#FACA0A] group-hover:text-slate-900 group-hover:scale-110 transition-all duration-300 shadow-sm">
          02
        </div>
        <div class="pl-2">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 px-3 py-0.5 rounded-full uppercase tracking-wider font-cursive">Module 02</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Component Testing
              <i class="fa-solid fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-amber-500"></i>
            </h3>
          </div>
          <p class="text-slate-600 leading-relaxed font-medium text-base sm:text-lg">
            This Laptop Repairing Course includes proper training on testing laptop components using industry level tools. Students learn to test adapters batteries RAM hard drive or SSD keyboards displays cooling fans and basic motherboard parts. Good understanding of component testing helps avoid unnecessary part replacement and ensures reliable repair work.
          </p>
        </div>
      </div>

      <!-- Module 03 -->
      <div class="group relative" data-aos="fade-up" data-aos-delay="300">
        <div class="absolute -left-[31px] sm:-left-[47px] top-0 w-10 h-10 rounded-full bg-yellow-100 border-4 border-white text-yellow-800 flex items-center justify-center font-bold text-sm group-hover:bg-[#FACA0A] group-hover:text-slate-900 group-hover:scale-110 transition-all duration-300 shadow-sm">
          03
        </div>
        <div class="pl-2">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 px-3 py-0.5 rounded-full uppercase tracking-wider font-cursive">Module 03</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Installation and Servicing
              <i class="fa-solid fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-amber-500"></i>
            </h3>
          </div>
          <p class="text-slate-600 leading-relaxed font-medium text-base sm:text-lg">
            Students gain hands on experience in safe laptop opening and closing procedures. Training covers installation and replacement of parts like keyboards screens batteries storage devices and cooling systems. Basic software installation operating system setup and driver configuration are also taught so servicing is done completely and correctly.
          </p>
        </div>
      </div>

      <!-- Module 04 -->
      <div class="group relative" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute -left-[31px] sm:-left-[47px] top-0 w-10 h-10 rounded-full bg-yellow-100 border-4 border-white text-yellow-800 flex items-center justify-center font-bold text-sm group-hover:bg-[#FACA0A] group-hover:text-slate-900 group-hover:scale-110 transition-all duration-300 shadow-sm">
          04
        </div>
        <div class="pl-2">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 px-3 py-0.5 rounded-full uppercase tracking-wider font-cursive">Module 04</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Safety Practices
              <i class="fa-solid fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-amber-500"></i>
            </h3>
          </div>
          <p class="text-slate-600 leading-relaxed font-medium text-base sm:text-lg">
            Safety is a very important part of laptop repairing work. Students are trained in safe handling of electronic parts correct use of tools and protection against electrostatic discharge. The course also includes proper power handling workspace safety and methods to prevent laptop damage during repair.
          </p>
        </div>
      </div>

      <!-- Module 05 -->
      <div class="group relative" data-aos="fade-up" data-aos-delay="200">
        <div class="absolute -left-[31px] sm:-left-[47px] top-0 w-10 h-10 rounded-full bg-yellow-100 border-4 border-white text-yellow-800 flex items-center justify-center font-bold text-sm group-hover:bg-[#FACA0A] group-hover:text-slate-900 group-hover:scale-110 transition-all duration-300 shadow-sm">
          05
        </div>
        <div class="pl-2">
          <div class="flex items-center gap-3 mb-2">
            <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 px-3 py-0.5 rounded-full uppercase tracking-wider font-cursive">Module 05</span>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors flex items-center gap-2">
              Real World Repair Cases
              <i class="fa-solid fa-arrow-right text-sm opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all text-amber-500"></i>
            </h3>
          </div>
          <p class="text-slate-600 leading-relaxed font-medium text-base sm:text-lg">
            Students work on real faulty laptops similar to those received in service centers. Live repair cases help students understand customer complaints repair time and quality expectations. This real world exposure builds confidence and prepares students to handle independent laptop repair work after course completion.
          </p>
        </div>
      </div>

    </div>

    <!-- Conclusion Note -->
    <div class="mt-14 p-6 rounded-2xl bg-yellow-100/80 border border-yellow-300 text-slate-900 font-semibold text-base sm:text-lg" data-aos="zoom-in">
      By completing this Laptop Repairing Course at our Laptop Repairing Institute in Patna students develop strong troubleshooting skills real practical experience and working confidence. This training prepares them to work professionally as laptop repair technicians in real market conditions.
    </div>

  </div>
</section>

<!-- 4. COURSE DURATION & TOOLS (Advanced Feature UI) -->
<section class="py-16 sm:py-24 bg-slate-50 border-b border-slate-200/60 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
      
      <!-- Duration Column -->
      <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 relative overflow-hidden group flex flex-col justify-between" data-aos="fade-right" data-aos-duration="800">
        <div class="absolute top-0 left-0 right-0 h-2 bg-blue-500"></div>
        <div>
          <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-2xl group-hover:rotate-6 group-hover:scale-110 transition-all duration-300 shadow-sm">
              <i class="fa-solid fa-clock"></i>
            </div>
            <div>
              <span class="text-xs font-extrabold text-blue-700 bg-blue-100 border border-blue-200 px-3 py-1 rounded-full uppercase tracking-wider font-cursive">Flexible Schedule</span>
              <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Course Duration & Training Mode</h2>
            </div>
          </div>

          <div class="space-y-5 text-slate-700 font-medium leading-relaxed">
            <div class="p-4 bg-blue-50/60 border-l-4 border-blue-500 rounded-r-2xl">
              <p>The Laptop Repairing Course at our Laptop Repairing Institute in Patna is planned in a flexible but focused way so students can build strong practical skills in a short time. This course is suitable for beginners as well as learners who want job ready skills without spending long time in academic training.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-calendar-day text-blue-600"></i> Course Duration
              </h4>
              <p>The Laptop Repairing Course duration usually ranges from a few weeks to a few months depending on the training plan and learning speed of the student. This flexible duration ensures that all important laptop repairing concepts are covered properly along with sufficient hands on practice. The course structure is ideal for students who want to enter the laptop repair industry quickly or start their own service work.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-[#FACA0A] fa-user-clock text-blue-600"></i> Daily Practical Hours
              </h4>
              <p>Daily training includes dedicated practical sessions where students spend most of their time working directly on laptops. Regular practice helps students improve fault diagnosis repair speed and overall confidence. Continuous hands on exposure makes students comfortable handling different laptop models and common repair problems.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-chalkboard-user text-blue-600"></i> Classroom and Workshop Training
              </h4>
              <p>The training method combines classroom learning with workshop based practical sessions. In classroom sessions students understand laptop components repair procedures and fault logic. In workshop sessions they apply the same knowledge on real laptops using professional tools. This balanced approach helps students clearly connect theory with real repair work.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Tools Column -->
      <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-lg hover:shadow-2xl transition-all duration-500 relative overflow-hidden group flex flex-col justify-between" data-aos="fade-left" data-aos-duration="800">
        <div class="absolute top-0 left-0 right-0 h-2 bg-amber-500"></div>
        <div>
          <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-800 flex items-center justify-center font-bold text-2xl group-hover:rotate-6 group-hover:scale-110 transition-all duration-300 shadow-sm">
              <i class="fa-solid fa-toolbox"></i>
            </div>
            <div>
              <span class="text-xs font-extrabold text-amber-800 bg-amber-100 border border-amber-200 px-3 py-1 rounded-full uppercase tracking-wider font-cursive">Professional Equipment</span>
              <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Tools & Practical Training</h2>
            </div>
          </div>

          <div class="space-y-5 text-slate-700 font-medium leading-relaxed">
            <div class="p-4 bg-amber-50/60 border-l-4 border-amber-500 rounded-r-2xl">
              <h4 class="font-bold text-slate-900 text-base mb-1">Real Machines for Practice</h4>
              <p>Students at our Laptop Repairing Institute in Patna get hands on training on real laptops and faulty machines that are commonly received in service centers. Working on actual laptops helps students understand different brands designs and fault patterns. This practical exposure prepares them to handle customer laptops confidently after course completion.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-[#FACA0A] fa-screwdrivers text-amber-600"></i> Industry Tools and Testing Meters
              </h4>
              <p>This Laptop Repairing Course includes proper training on industry standard tools and testing meters used by professional laptop technicians. Students learn to use multimeters adapters diagnostic tools and basic testing equipment to check laptop components correctly. Correct tool handling improves repair quality and reduces the risk of damage during work.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-bolt-lightning text-amber-600"></i> Live Fault Repairing Sessions
              </h4>
              <p>One of the main highlights of this Laptop Repairing Course is live fault repairing sessions. During these sessions students work on real time laptop problems under expert supervision. These sessions create a real service center environment and help students develop problem solving skills time management and professional work habits. Live repair practice builds confidence and prepares students for independent laptop repair work.</p>
            </div>
          </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100">
          <p class="text-slate-700 font-medium leading-relaxed text-sm sm:text-base">
            By completing this practical training at our Laptop Repairing Institute in Patna students gain real hands on experience technical confidence and industry level skills. This training helps them succeed in the laptop repairing field.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 5. CERTIFICATION & CAREER OPPORTUNITIES (20-Year UI Designer Masterpiece) -->
<section class="py-20 sm:py-28 bg-white border-b border-slate-100 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Certification -->
      <div class="lg:col-span-5 bg-slate-50/80 rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-lg relative overflow-hidden group hover:shadow-2xl transition-all duration-500" data-aos="fade-right">
        <div class="absolute top-0 left-0 right-0 h-2 bg-[#FACA0A]"></div>
        
        <div class="flex items-center justify-between mb-8">
          <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold text-2xl group-hover:rotate-6 group-hover:scale-110 transition-all duration-300 shadow-sm">
            <i class="fa-solid fa-award"></i>
          </div>
          <span class="text-xs font-extrabold text-yellow-800 bg-yellow-100 border border-yellow-200 px-3 py-1 rounded-full uppercase tracking-wider font-cursive">Official Certificate</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">Certification</h2>

        <div class="space-y-6 text-slate-700 font-medium leading-relaxed">
          <div class="p-5 bg-white border-l-4 border-yellow-400 rounded-r-2xl shadow-sm">
            <h4 class="font-bold text-slate-900 text-base mb-1">Certificate After Course Completion</h4>
            <p>After successful completion of the Laptop Repairing Course students receive a course completion certificate from our Laptop Repairing Institute in Patna. This certificate confirms that the student has received practical training in laptop hardware and servicing and is capable of handling real repair work. This certificate adds professional value while applying for jobs in laptop service centers computer repair shops and electronics businesses. It also helps students gain customer trust when starting their own laptop repairing service or shop.</p>
          </div>
          
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-circle-check text-green-500 mt-1 text-lg shrink-0"></i>
            <div>
              <h4 class="font-bold text-slate-900 text-base mb-1">Helps in Job and Self Business</h4>
              <p>The certification works as proof of skill for both employers and customers. It supports career growth, improves job opportunities and builds confidence for students planning self employment in the laptop repair industry.</p>
            </div>
          </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-200/80 flex items-center justify-between text-xs font-extrabold text-slate-500 uppercase tracking-wider">
          <span class="flex items-center gap-1.5"><i class="fa-solid fa-shield-halved text-yellow-600"></i> Lifetime Validity</span>
          <span class="flex items-center gap-1.5"><i class="fa-solid fa-building text-yellow-600"></i> Job Ready</span>
        </div>
      </div>

      <!-- Career & Earning Opportunities -->
      <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-lg relative overflow-hidden group hover:shadow-2xl transition-all duration-500" data-aos="fade-left">
        <div class="absolute top-0 left-0 right-0 h-2 bg-green-500"></div>

        <div class="flex items-center justify-between mb-8">
          <div class="w-14 h-14 rounded-2xl bg-green-50 text-green-700 flex items-center justify-center font-bold text-2xl group-hover:rotate-6 group-hover:scale-110 transition-all duration-300 shadow-sm">
            <i class="fa-solid fa-chart-line"></i>
          </div>
          <span class="text-xs font-extrabold text-green-800 bg-green-100 border border-green-200 px-3 py-1 rounded-full uppercase tracking-wider font-cursive">Career Scope</span>
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">Career & Earning Opportunities</h2>
        <p class="text-slate-600 font-medium mb-6">Laptop repairing is a stable and growing field with many career options. After completing the Laptop Repairing Course students can choose different work paths based on their interest and future plans.</p>

        <div class="space-y-6 text-slate-700 font-medium leading-relaxed">
          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-briefcase text-green-600"></i> Job Opportunities
            </h4>
            <p>Students can work as laptop repair technicians in service centers computer shops offices and electronics repair units. With strong practical training freshers can become job ready in a short time.</p>
          </div>

          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-user-gear text-blue-600"></i> Freelancing Work
            </h4>
            <p>Many technicians choose freelancing in laptop repairing. This includes doorstep repair services part time servicing work or providing repair support to local shops.</p>
          </div>

          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-store text-amber-600"></i> Own Service Center
            </h4>
            <p>Students can also start their own laptop or computer repair shop with low investment. This option is suitable for those who want self employment and long term business growth.</p>
          </div>

          <div class="p-5 bg-green-50 border border-green-200 rounded-2xl text-slate-800">
            <h4 class="font-bold text-green-900 text-base mb-1 flex items-center gap-2">
              <i class="fa-solid fa-sack-dollar text-green-600"></i> Monthly Income Potential
            </h4>
            <p class="text-slate-700">Income depends on skill level experience and customer base. Skilled technicians can earn a steady monthly income. Those running their own service center have higher earning potential with time and regular customers.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- 6. WHO CAN JOIN & WHY CHOOSE OUR INSTITUTE -->
<section class="py-16 sm:py-24 bg-slate-50 border-b border-slate-200/60">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      
      <!-- Who Can Join -->
      <div data-aos="fade-right">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-6 flex items-center gap-3">
          <i class="fa-solid fa-users text-blue-600"></i> Who Can Join This Course
        </h2>
        <div class="space-y-4 text-slate-700 font-medium leading-relaxed">
          <p>This Laptop Repairing Course is designed to be beginner friendly and fully practical. No advanced technical background is required to join this training.</p>
          <p>This Laptop Repairing Course is suitable for students who have passed tenth or twelfth and are looking for skill based career options. ITI students who want hands on laptop repair training can also join. Working technicians who want to upgrade their technical skills will find this course useful.</p>
          <p>Freshers searching for job oriented technical training can start their career through this course. Business minded individuals planning to open a repair shop can also benefit from this training. Anyone who has interest in electronics troubleshooting and practical technical work can easily join this Laptop Repairing Course.</p>
        </div>
      </div>

      <!-- Why Choose Our Institute -->
      <div data-aos="fade-left">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-6 flex items-center gap-3">
          <i class="fa-solid fa-building-columns text-amber-600"></i> Why Choose Our Institute
        </h2>
        <p class="text-slate-600 font-medium mb-4">Choosing the right training institute plays an important role in long term career success. At our Laptop Repairing Institute in Patna the focus is always on building real skills and practical knowledge not just theory.</p>
        
        <div class="space-y-3 text-slate-700 font-medium leading-relaxed">
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-chalkboard-user text-amber-600 mr-2"></i> Experienced Trainers:</b> Training is provided by trainers who have real service center experience. They understand actual repair work market needs and customer expectations.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-screwdriver-wrench text-amber-600 mr-2"></i> Practical Focused Learning:</b> Maximum focus is given to hands on practice using real laptops and live fault conditions. Students learn by doing real repair work which improves confidence and skill level.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-wallet text-amber-600 mr-2"></i> Affordable Fees:</b> Course fees are kept reasonable so students from all backgrounds can access quality training. The aim is to provide value without creating financial burden.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-users-rectangle text-amber-600 mr-2"></i> Small Batch Size:</b> Each batch has limited number of students so everyone gets personal attention. This helps in better learning faster understanding and more confidence.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-headset text-amber-600 mr-2"></i> Lifetime Technical Support:</b> Even after completing the course students can contact the institute for technical guidance and support. This ongoing help is useful during real repair work in the market.
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 7. STUDENT ENQUIRY / CALL TO ACTION BANNER -->
<section class="bg-[#FACA0A] py-16 px-4 text-slate-900">
  <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in">
    <h2 class="text-3xl sm:text-4xl font-black mb-6 tracking-tight">
      Student Enquiry & Action
    </h2>
    <div class="text-base sm:text-lg font-medium mb-8 text-slate-900 max-w-3xl mx-auto leading-relaxed space-y-4">
      <p>Ready to build a career in laptop repairing. This is the right time to start and move toward a stable future. Our Laptop Repairing Institute in Patna provides practical training expert guidance and career oriented learning to help students succeed in the electronics repair industry.</p>
      <p>Start your career in electronics repairing today by getting in touch with us. Fill out our short enquiry form to receive complete course details. You can also call us directly for counselling and information about upcoming batches. For quick response and admission related support students can contact us on WhatsApp.</p>
      <p class="font-bold text-slate-900 text-lg">Seats are limited so early enquiry is recommended. Join now and take the first step toward a skilled confident and self reliant career.</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('contact') }}" class="bg-slate-900 text-white px-8 py-4 rounded-full font-bold text-base hover:bg-slate-800 transition-all shadow-lg">
        Enquire Now
      </a>
      <a href="https://wa.me/917870516006" target="_blank" class="bg-white text-slate-900 px-8 py-4 rounded-full font-bold text-base hover:bg-slate-50 transition-all shadow-md flex items-center justify-center gap-2">
        <i class="fa-brands fa-whatsapp text-green-600 text-xl"></i> WhatsApp Us
      </a>
    </div>
  </div>
</section>

<!-- 8. FREQUENTLY ASKED QUESTIONS (Globally Trending Split Accordion Layout) -->
<section class="py-20 sm:py-28 bg-white border-t border-slate-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left Column (Sticky Sidebar Header & Help Box) -->
      <div class="lg:col-span-5 lg:sticky lg:top-28" data-aos="fade-right">
        <div class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-800 border border-yellow-200 text-xs font-extrabold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
          <i class="fa-solid fa-circle-question text-yellow-600"></i> Got Questions?
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">Frequently Asked Questions</h2>
        <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-medium mb-8">
          Clear all your doubts about our laptop repairing course in Patna before enrolling. We provide complete transparency on training, tools, and career support.
        </p>

        <!-- Direct Contact Support Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-3xl p-6 sm:p-8 space-y-4">
          <div class="w-12 h-12 rounded-2xl bg-[#FACA0A] text-slate-900 flex items-center justify-center text-xl font-bold shadow-sm">
            <i class="fa-solid fa-headset"></i>
          </div>
          <h4 class="text-xl font-bold text-slate-900">Have a specific question?</h4>
          <p class="text-slate-600 text-sm font-medium leading-relaxed">
            Our career counselors are ready to help you with course fees, batch timings, and registration details.
          </p>
          <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <a href="tel:7870516006" class="inline-flex items-center justify-center px-5 py-2.5 bg-slate-900 text-white rounded-xl text-xs font-bold hover:bg-slate-800 transition-all">
              <i class="fa-solid fa-phone text-[#FACA0A] mr-2"></i> Call 7870516006
            </a>
            <a href="https://wa.me/917870516006" target="_blank" class="inline-flex items-center justify-center px-5 py-2.5 bg-white border border-slate-200 text-slate-900 rounded-xl text-xs font-bold hover:bg-slate-100 transition-all">
              <i class="fa-brands fa-whatsapp text-green-600 mr-2 text-base"></i> WhatsApp
            </a>
          </div>
        </div>
      </div>

      <!-- Right Column (Interactive Expanding Accordions) -->
      <div class="lg:col-span-7 space-y-4" data-aos="fade-left">
        @php
          $faqs = [
            ['q' => 'Do I need prior technical knowledge to join the laptop repairing course', 'a' => 'No prior technical knowledge is required to join this course. At our Laptop Repairing Institute in Patna training starts from basic concepts and slowly moves toward advanced practical work. This makes the course suitable for beginners freshers and students with no technical background.'],
            ['q' => 'Is the laptop repairing course more practical or theory-based', 'a' => 'The course is mainly practical focused. Students spend most of their time working on real laptops tools and live fault cases. Theory is explained only to support practical understanding and help improve troubleshooting skills.'],
            ['q' => 'Will I get a certificate after completing the laptop repairing course', 'a' => 'Yes students receive a course completion certificate after successfully finishing the training. This certificate is useful while applying for jobs and also helps build customer trust for those planning to start their own repair business.'],
            ['q' => 'Can I start my own laptop repairing shop after this course', 'a' => 'Yes this course is designed for both job and self employment. With hands-on training and real repair experience students gain the confidence to start their own laptop or computer repair service.'],
            ['q' => 'What job opportunities are available after completing the course', 'a' => 'After completing the course students can work in laptop service centers computer repair shops offices or as freelance technicians. Many students also choose to start and run their own repair business.'],
            ['q' => 'What is the duration of the laptop repairing course', 'a' => 'The course duration depends on the training level and batch type you choose. Some students go for short term laptop repairing courses to start work early, while others prefer advanced training for deeper technical knowledge. The structure is kept flexible to match different learning needs.'],
            ['q' => 'Do students get hands on practice on real faulty laptops', 'a' => 'Yes. Training is completely practical. Students work on real laptops facing common and advanced problems like power issues, display faults, motherboard problems, and software errors. This helps you understand actual service situations before dealing with customers.'],
            ['q' => 'Are tools and testing equipment provided during the training', 'a' => 'Yes. All required laptop repairing tools, testing devices, and machines are provided by the institute during the training period. You can focus fully on learning without worrying about tool investment.'],
            ['q' => 'Is this laptop repairing course suitable for working professionals or part time learners', 'a' => 'Yes. The course is designed keeping working professionals and students in mind. Flexible batch timings make it easy to learn laptop repairing even if you are attending classes part time.'],
            ['q' => 'Is there any support provided after completing the course', 'a' => 'Yes. After course completion, support is available for technical guidance, career direction, and help with starting or expanding your laptop repairing business. The aim is to make sure you feel confident working independently in the local market.']
          ];
        @endphp

        @foreach($faqs as $index => $faq)
        <details class="group bg-slate-50/70 border border-slate-200/80 rounded-2xl transition-all duration-300 open:bg-white open:shadow-xl open:border-yellow-400 overflow-hidden cursor-pointer" {{ $index === 0 ? 'open' : '' }}>
          <summary class="flex items-center justify-between p-6 font-bold text-slate-900 text-base sm:text-lg list-none group-hover:text-amber-600 transition-colors select-none">
            <span class="flex items-center gap-3">
              <span class="w-7 h-7 rounded-lg bg-yellow-100 text-yellow-800 text-xs font-extrabold flex items-center justify-center shrink-0">0{{ $index + 1 }}</span>
              <span>{{ $faq['q'] }}?</span>
            </span>
            <div class="w-8 h-8 rounded-full bg-slate-200/60 group-open:bg-[#FACA0A] group-open:text-slate-900 text-slate-600 flex items-center justify-center shrink-0 ml-4 transition-all duration-300">
              <i class="fa-solid fa-chevron-down text-xs group-open:rotate-180 transition-transform duration-300"></i>
            </div>
          </summary>
          <div class="px-6 pb-6 pt-2 text-slate-600 text-base font-medium leading-relaxed border-t border-slate-100 pl-16">
            {{ $faq['a'] }}
          </div>
        </details>
        @endforeach

      </div>

    </div>
  </div>
</section>

@endsection
