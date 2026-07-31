@extends('layouts.app')

@section('title', 'Mobile Repairing Course in Patna | Smartphone Repair Institute')

@section('meta')
    <meta name="keywords" content="Mobile Repairing Course in Patna, Mobile Repairing Institute in Patna, smartphone repair course Patna, mobile mechanic course Patna, Android hardware software repairing Patna" />
    <meta name="description" content="Join the best Mobile Repairing Course in Patna. Master Android smartphone hardware & software repairing, IC level diagnostics, display replacement & certification.">
    <link rel="canonical" href="{{ route('courses.mobile') }}" />
@endsection

@section('content')

<!-- 1. HERO HEADER SECTION -->
<section class="relative bg-gradient-to-b from-amber-500/10 via-white to-slate-50 py-16 sm:py-24 border-b border-slate-200/60 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <!-- Text Column -->
      <div class="lg:col-span-7" data-aos="fade-right" data-aos-duration="800">
        <div class="inline-flex items-center gap-2 bg-[#FACA0A] text-slate-900 font-extrabold px-4 py-1.5 rounded-full text-sm sm:text-base mb-6 shadow-sm font-cursive tracking-wide">
          <i class="fa-solid fa-certificate"></i> Practical & Job Focused Training
        </div>
        
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 leading-tight mb-6 tracking-tight">
          Mobile Repairing Course in <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-yellow-500">Patna</span>
        </h1>

        <div class="space-y-4 text-slate-700 text-base sm:text-lg leading-relaxed font-medium mb-8">
          <p>
            The <b>Mobile Repairing Course</b> offered by our <b>Mobile Repairing Institute in Patna</b> is made for students who want to learn mobile repairing in a practical and job focused way. This training is based on real repair work and not only theory or classroom explanation. Students practice on real smartphones real tools and real fault conditions that are commonly seen in local repair shops and service centers.
          </p>
          <p>
            Mobile phones are now part of daily life and almost every person depends on them. Because of this there is always demand for trained mobile repair technicians. This <b>Mobile Repairing Course</b> is planned to help students understand how mobile phones work how problems occur and how repairs are done safely. Training starts from basic mobile phone knowledge and slowly moves to advanced smartphone repairing so learners gain confidence at every stage.
          </p>
          <p>
            Students get hands on training on Android smartphones and important hardware parts. They learn to repair common issues like charging problem display damage battery fault and network issue. We guide students on correct mobile opening and closing methods part identification and servicing practices used in professional repair work. Along with hardware students also learn basic software related work required during mobile servicing.
          </p>
          <p class="text-slate-800 font-bold bg-white/80 p-3 rounded-xl border border-slate-200 inline-block">
            At our Mobile Repairing Institute in Patna the main focus is on skill development for job and self business. Students work on real phones under proper guidance so their learning matches actual market needs. The course is taught in a simple and easy way so even beginners can learn without confusion.
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
              <i class="fa-solid fa-mobile-screen-button"></i>
            </div>
            <div>
              <h3 class="text-xl font-bold text-slate-900">Smartphone Lab</h3>
              <p class="text-slate-500 text-sm font-medium">Live Device Diagnostics</p>
            </div>
          </div>
          
          <div class="space-y-4 text-slate-700 text-sm font-medium border-t border-slate-100 pt-6">
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Hardware: Display, Battery, Charging & Network Faults</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Software: Flashing, Unlocking, Setup & OS Diagnostics</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Component Testing, Multimeter & ESD Safety</span>
            </div>
            <div class="flex items-start gap-3">
              <i class="fa-solid fa-circle-check text-green-500 mt-1"></i>
              <span>Course Certificate & Business Setup Guidance</span>
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
      <p class="text-slate-600 font-medium text-base sm:text-lg">Open for 10th/12th pass, college students, job seekers, shop owners & technicians.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
      
      <!-- Flow Item 1 -->
      <div class="group relative pl-6 border-l-2 border-yellow-300 hover:border-yellow-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="100">
        <div class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-[#FACA0A] group-hover:text-slate-900 transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-user-graduate"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          10th, 12th & College Students
          <i class="fa-solid fa-arrow-right text-xs text-yellow-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          This Mobile Repairing Course is suitable for anyone who wants to build a career in the mobile service industry or start their own mobile repairing business. No technical background is required so this course is a good option for beginners and people from non technical fields. It is best suited for students who have passed tenth or twelfth and college students looking for earning opportunities.
        </p>
      </div>

      <!-- Flow Item 2 -->
      <div class="group relative pl-6 border-l-2 border-blue-300 hover:border-blue-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="200">
        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-screwdriver-wrench"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          Job Seekers & Working Professionals
          <i class="fa-solid fa-arrow-right text-xs text-blue-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          Job seekers who want stable and in demand work can benefit from this training. Working professionals who are planning a career change or want an extra income source can also join. Shop owners and technicians who want to upgrade their mobile repairing skills will find this course helpful.
        </p>
      </div>

      <!-- Flow Item 3 -->
      <div class="group relative pl-6 border-l-2 border-green-300 hover:border-green-500 transition-colors duration-300" data-aos="fade-up" data-aos-delay="300">
        <div class="w-10 h-10 rounded-xl bg-green-100 text-green-800 flex items-center justify-center font-bold text-base mb-4 group-hover:scale-110 group-hover:bg-green-500 group-hover:text-white transition-all duration-300 shadow-sm">
          <i class="fa-solid fa-briefcase"></i>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3 flex items-center justify-between">
          Self-Employment & Shop Owners
          <i class="fa-solid fa-arrow-right text-xs text-green-600 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
        </h3>
        <p class="text-slate-600 leading-relaxed font-medium text-base">
          It is also ideal for individuals who want self employment or plan to open their own mobile repair shop. If you enjoy working with technology solving problems and learning practical skills then this course is the right fit. With proper training and regular practice mobile repairing can offer quick earning opportunities along with long term career growth.
        </p>
      </div>

    </div>

    <!-- Summary Callout -->
    <div class="mt-10 p-6 rounded-2xl bg-white border border-slate-200 text-slate-800 font-medium text-base sm:text-lg" data-aos="fade-up">
      By joining our Mobile Repairing Institute in Patna students take a strong step toward becoming confident and skilled mobile repair technicians. This training prepares them to work independently and handle real market challenges in today competitive environment.
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
        At our Mobile Repairing Institute in Patna the <b>Mobile Repairing Course</b> is planned to give students complete practical knowledge of mobile phone repairing work. Training is focused on skills that are actually used in service centers and customer based repair jobs so students are ready for real work.
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
            Students learn proper and systematic ways to identify mobile phone problems correctly. Training includes common faults like dead phone no power charging problem network issue sound problem display issue and overheating. Instead of guessing students are taught logical troubleshooting methods to find the exact cause of the problem. This helps save time reduce mistakes and improve confidence during real repair work.
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
            In this Mobile Repairing Course students learn how to test different mobile phone parts using correct tools and methods. They are trained to check batteries charging ports speakers microphones cameras displays and other internal components. Component testing helps students decide whether a part needs repair or replacement which improves repair quality and customer trust.
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
            Students get hands on practice in safe mobile phone opening and closing. Training includes replacement and installation of commonly damaged parts like screens batteries charging jacks and other parts. Basic software installation and phone setup is also taught so the phone works properly after servicing.
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
            Safety is an important part of mobile repairing work. Students are trained in safe handling of electronic parts batteries and repair tools. The course covers basic ESD precautions proper power handling and safe working methods. Learning safety practices helps students follow professional repair standards and avoid damage.
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
            One major part of this Mobile Repairing Course is working on real faulty phones. Students practice on actual devices similar to those received in service centers. This helps them understand real customer issues repair time expectations and quality standards. Real case training builds confidence and prepares students for independent repair work.
          </p>
        </div>
      </div>

    </div>

    <!-- Conclusion Note -->
    <div class="mt-14 p-6 rounded-2xl bg-yellow-100/80 border border-yellow-300 text-slate-900 font-semibold text-base sm:text-lg" data-aos="zoom-in">
      By completing the Mobile Repairing Course at our Mobile Repairing Institute in Patna students develop strong practical skills problem solving ability and real working confidence. This training prepares them to work professionally and handle real market conditions after course completion.
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
              <p>The Mobile Repairing Course at our Mobile Repairing Institute in Patna is designed to give flexible but focused training so students can build strong practical skills in a short time. This course is suitable for beginners as well as learners who want fast and job ready mobile repairing knowledge.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-calendar-day text-blue-600"></i> Course Duration
              </h4>
              <p>The Mobile Repairing Course duration can be from a few weeks to a few months depending on the learning speed and training plan selected by the student. This flexible structure helps students complete the course comfortably without pressure while all important mobile repairing concepts and practical work are covered. The duration is ideal for those who want to enter the mobile service industry quickly or start their own mobile repair business.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-[#FACA0A] fa-user-clock text-blue-600"></i> Daily Practical Hours
              </h4>
              <p>Daily training includes dedicated practical hours where students spend most of their time working directly on mobile phones. Instead of only theory the focus is on hands on practice so students clearly learn how to diagnose and repair real mobile phone problems. Regular practice sessions improve speed accuracy and confidence in device handling.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-chalkboard-user text-blue-600"></i> Classroom and Workshop Training
              </h4>
              <p>The training system combines classroom teaching with workshop based practical sessions. In the classroom students learn basic concepts fault understanding and repair processes. In the workshop the same knowledge is applied on real mobile phones using professional tools. This balanced method helps students understand both theory and practical application in a clear way.</p>
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
              <p>Students at our Mobile Repairing Institute in Patna practice on real smartphones and faulty devices that are commonly seen in service centers. Working on real machines helps students understand different mobile models designs and fault patterns. This practical exposure prepares learners to handle customer phones confidently after completing the course.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-[#FACA0A] fa-screwdrivers text-amber-600"></i> Industry Tools and Testing Meters
              </h4>
              <p>This Mobile Repairing Course includes proper training on industry standard tools and testing meters used by professional mobile technicians. Students learn correct usage of tools for mobile opening component testing and fault checking. Knowing how to use the right tools improves repair quality and reduces the chance of damage during work.</p>
            </div>
            
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
              <h4 class="font-bold text-slate-900 text-base mb-1 flex items-center gap-2">
                <i class="fa-solid fa-bolt-lightning text-amber-600"></i> Live Fault Repairing Sessions
              </h4>
              <p>One of the most important parts of the training is live fault repairing sessions. During these sessions students work on real time mobile problems under expert guidance. This type of practice creates a service center like environment and helps students learn decision making time handling and problem solving. Live repair training builds confidence and prepares students for independent mobile repairing work.</p>
            </div>
          </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100">
          <p class="text-slate-700 font-medium leading-relaxed text-sm sm:text-base">
            By completing this practical training at our Mobile Repairing Institute in Patna students gain real hands on experience technical confidence and industry level skills. This helps them move forward successfully in the mobile repairing profession.
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
            <p>After successfully completing the Mobile Repairing Course students receive a course completion certificate from our Mobile Repairing Institute in Patna. This certificate confirms that the student has completed practical training in mobile phone repairing and has gained hands on skills needed for real repair work. This certification helps students build trust while applying for jobs at mobile service centers electronics shops and authorized repair outlets. It is also helpful for those starting their own mobile repair business because customers feel more confident giving their phones to a trained and certified technician.</p>
          </div>
          
          <div class="flex items-start gap-3">
            <i class="fa-solid fa-circle-check text-green-500 mt-1 text-lg shrink-0"></i>
            <div>
              <h4 class="font-bold text-slate-900 text-base mb-1">Helps in Job and Self Business</h4>
              <p>The certificate works as proof of skill for both employers and customers. Whether you plan to work under an existing shop or open your own mobile repairing business this certification strengthens your professional profile. It also helps students stand out in a competitive market and grow with confidence.</p>
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
        <p class="text-slate-600 font-medium mb-6">The mobile repairing field offers multiple career options with good earning potential in a short time. After completing the Mobile Repairing Course students can choose different work paths based on their goals.</p>

        <div class="space-y-6 text-slate-700 font-medium leading-relaxed">
          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-briefcase text-green-600"></i> Job Opportunities
            </h4>
            <p>Students can work as mobile repair technicians in local service centers retail mobile shops and electronics repair hubs. With strong practical skills even freshers can start earning soon after course completion.</p>
          </div>

          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-user-gear text-blue-600"></i> Freelancing Work
            </h4>
            <p>Mobile repairing also gives scope for freelancing work. Technicians can provide doorstep repair services do part time repairing or tie up with mobile shops for regular repair work.</p>
          </div>

          <div class="p-5 bg-slate-50 rounded-2xl border border-slate-100">
            <h4 class="font-bold text-slate-900 text-base mb-2 flex items-center gap-2">
              <i class="fa-solid fa-store text-amber-600"></i> Own Service Center
            </h4>
            <p>Many students choose to open their own mobile repair shop or service counter. With low investment and continuous demand running a service center is a popular self employment option.</p>
          </div>

          <div class="p-5 bg-green-50 border border-green-200 rounded-2xl text-slate-800">
            <h4 class="font-bold text-green-900 text-base mb-1 flex items-center gap-2">
              <i class="fa-solid fa-sack-dollar text-green-600"></i> Monthly Income Potential
            </h4>
            <p class="text-slate-700">Income depends on skill level working area and customer base. Skilled technicians can earn a steady monthly income. Those running their own repair business have higher earning potential with experience and regular customers.</p>
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
          <p>This Mobile Repairing Course is designed to be simple practical and beginner friendly. No advanced technical background is required to join this training.</p>
          <p>The Mobile Repairing Course is suitable for students who have passed tenth or twelfth and are looking for skill based career options. ITI students who want hands on industry exposure can also benefit from this course. Working technicians who want to upgrade or expand their mobile repairing skills will find this training useful.</p>
          <p>Freshers searching for quick and job oriented training can start their career through this course. Business minded individuals planning to open a mobile repair shop can also join. Anyone who has interest in electronics repairing and practical work can easily learn through this Mobile Repairing Course.</p>
        </div>
      </div>

      <!-- Why Choose Our Institute -->
      <div data-aos="fade-left">
        <h2 class="text-2xl font-extrabold text-slate-900 mb-6 flex items-center gap-3">
          <i class="fa-solid fa-building-columns text-amber-600"></i> Why Choose Our Institute
        </h2>
        <p class="text-slate-600 font-medium mb-4">Choosing the right training institute plays an important role in building real mobile repairing skills. At our Mobile Repairing Institute in Patna the focus is always on quality learning and practical knowledge not just finishing the course.</p>
        
        <div class="space-y-3 text-slate-700 font-medium leading-relaxed">
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-chalkboard-user text-amber-600 mr-2"></i> Experienced Trainers:</b> Training is given by trainers who have real service center experience. They understand actual market work customer expectations and common repair challenges.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-screwdriver-wrench text-amber-600 mr-2"></i> Practical Focused Learning:</b> Maximum focus is given to hands on practice using real mobile phones and live fault conditions. Students learn by doing actual repair work instead of only listening to theory.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-wallet text-amber-600 mr-2"></i> Affordable Fees:</b> Course fees are kept reasonable so students from different backgrounds can easily join. Quality training is made accessible without unnecessary financial pressure.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-users-rectangle text-amber-600 mr-2"></i> Small Batch Size:</b> Each batch has limited students so every learner gets personal attention. This helps in better understanding faster learning and more confidence.
          </div>
          <div class="p-3 bg-white rounded-xl border border-slate-200">
            <b class="text-slate-900"><i class="fa-solid fa-headset text-amber-600 mr-2"></i> Lifetime Technical Support:</b> Even after completing the course students can contact the institute for technical guidance. Support is available whenever students face issues in real repair work.
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
      <p>Ready to build a career in mobile repairing and move toward a stable future. This is the right time to take your first step. Our Mobile Repairing Institute in Patna provides practical training expert guidance and full career support to help students succeed in the electronics repairing field.</p>
      <p>Start your career in electronics repairing today by connecting with us. Fill out our short enquiry form to get complete course details. You can also call us directly for counselling and batch related information. For quick response and admission support students can contact us on WhatsApp.</p>
      <p class="font-bold text-slate-900 text-lg">Seats are limited so early enquiry is recommended. Join now and begin your journey toward a skilled confident and self reliant career.</p>
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
          Clear all your doubts about our mobile repairing course in Patna before enrolling. We provide complete transparency on training, tools, and career support.
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
            ['q' => 'Do I need any technical background to join the mobile repairing course', 'a' => 'No technical background is required. At our Mobile Repairing Institute in Patna training starts from basic concepts and slowly moves toward practical repair work. This makes it easy for beginners freshers and students from non technical backgrounds to learn comfortably.'],
            ['q' => 'Is this course more practical or theory based', 'a' => 'This course is mainly practical focused. Students spend most of their time working on real mobile phones tools and live fault cases. Theory is explained only to support practical understanding and real repair work.'],
            ['q' => 'Will I get a certificate after completing the course', 'a' => 'Yes students receive a course completion certificate after successfully finishing the training. This certificate is helpful while applying for jobs and also useful when starting your own mobile repair business.'],
            ['q' => 'Can I start my own mobile repairing shop after this course', 'a' => 'Yes the course is designed to prepare students for self employment. Along with repair skills students gain confidence to handle customer phones which makes it easier to start a mobile repair shop or service center.'],
            ['q' => 'What kind of job opportunities are available after completing the course', 'a' => 'After completing the course students can work in mobile service centers electronics shops or as freelance technicians. Many students also choose to open their own mobile repairing business.'],
            ['q' => 'What is the duration of the mobile repairing course', 'a' => 'The course duration depends on the level of training you select. Some students choose short term mobile repairing courses to start work early while others go for advanced mobile repairing courses to gain deeper knowledge. You can choose a program that fits your learning goals and available time.'],
            ['q' => 'Do students get hands on training on real mobile phones', 'a' => 'Yes. Training is fully practical. Students work on real smartphones and feature phones during the course. Both common and advanced faults are covered so learners gain real world repair experience before handling customer devices.'],
            ['q' => 'Are tools and repairing equipment provided during the course', 'a' => 'Yes. All required mobile repairing tools testing devices and equipment are provided by the institute during the training period. Students do not need to invest in tools while learning.'],
            ['q' => 'Is this mobile repairing course suitable for part time learners', 'a' => 'Yes. This course is suitable for students working professionals and business owners. Flexible batch timings make it comfortable for part time learners to attend classes along with their daily routine.'],
            ['q' => 'Is any support provided after completing the mobile repairing course', 'a' => 'Yes. After completing the course students receive guidance for technical doubts, career planning and support for starting their own mobile repairing business. The focus is to help you work confidently and independently in the local market.']
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
