<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Certificate | {{ $student->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Luxury Certificate Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Great+Vibes&family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600&family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600;1,700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #060b13;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-family: 'Montserrat', sans-serif;
        }

        .cert-scale-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
            padding: 1.5rem 0.5rem;
        }

        /* Standard A4 Landscape Proportions (297mm x 210mm = 1.414 ratio) */
        .cert-wrapper {
            width: 1060px;
            height: 750px;
            position: relative;
            background-image: url("{{ asset('assets/images/certificate-navy-gold-frame.jpg') }}");
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.7), 0 0 0 1px rgba(212, 175, 55, 0.35);
            margin: 0 auto;
            transform-origin: top center;
            box-sizing: border-box;
        }

        @media screen and (max-width: 1100px) {
            .cert-wrapper {
                zoom: 0.88;
            }
        }
        @media screen and (max-width: 950px) {
            .cert-wrapper {
                zoom: 0.72;
            }
        }
        @media screen and (max-width: 780px) {
            .cert-wrapper {
                zoom: 0.58;
            }
        }
        @media screen and (max-width: 620px) {
            .cert-wrapper {
                zoom: 0.46;
            }
        }
        @media screen and (max-width: 480px) {
            .cert-wrapper {
                zoom: 0.35;
            }
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 0;
            }
            body {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                height: 100% !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }
            .cert-scale-container {
                overflow: visible !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .cert-wrapper {
                box-shadow: none !important;
                width: 297mm !important;
                height: 210mm !important;
                zoom: 1 !important;
                transform: none !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="print:py-0 py-4 sm:py-8">

    <!-- Top Action Bar (hidden when printing) -->
    <div class="no-print mb-4 sm:mb-6 flex flex-wrap justify-center gap-3 sm:gap-4 px-4">
        <a href="{{ url('/') }}" class="px-4 sm:px-5 py-2 sm:py-2.5 rounded-xl border border-slate-700 bg-slate-800/90 hover:bg-slate-700 text-amber-400 font-bold text-xs sm:text-sm transition duration-150 flex items-center gap-2 shadow-sm">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
        <button onclick="window.print()" class="px-5 sm:px-6 py-2 sm:py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-yellow-500 to-amber-600 hover:from-amber-600 hover:to-yellow-600 text-slate-950 font-black text-xs sm:text-sm shadow-lg shadow-amber-500/25 transition duration-150 flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Print Official Certificate
        </button>
    </div>

    @php
        $certInchargeSig = \App\Models\Setting::where('key', 'cert_incharge_signature')->value('value');
        $certSignature = \App\Models\Setting::where('key', 'cert_signature')->value('value');
        $rawFather = $student->certificate->father_name;
        $fatherName = ($rawFather && strtolower(trim($rawFather)) !== 'null' && strtolower(trim($rawFather)) !== '') ? strtoupper($rawFather) : '—';
    @endphp

    <!-- LUXURY CERTIFICATE CANVAS -->
    <div class="cert-scale-container">
        <!-- Certificate Canvas: Fixed A4 Aspect Ratio with Centered Safe Area Content -->
        <div class="cert-wrapper select-none text-slate-900 relative flex flex-col justify-between" style="padding: 44px 0 46px 0;">

            <!-- ================= 1. TOP METADATA BAR (SAFE COMPACT CENTER - ZERO OVERLAY) ================= -->
            <div class="w-full flex flex-col items-center gap-1 pt-1">
                <!-- Center ISO Certification Pill -->
                <div class="inline-flex items-center gap-1.5 px-3.5 py-0.5 bg-amber-500/10 border border-amber-400/50 rounded-full text-[8.5px] font-extrabold tracking-widest text-[#7a4e00] uppercase shadow-2xs">
                    <i class="fa-solid fa-star text-amber-500 text-[7px]"></i>
                    <span>AN ISO 9001:2015 CERTIFIED INSTITUTE</span>
                    <i class="fa-solid fa-star text-amber-500 text-[7px]"></i>
                </div>

                <!-- Resized Compact Regd. No. & Sl. No. Strip -->
                <div class="inline-flex items-center gap-3 px-3 py-0.5 bg-amber-50/90 border border-amber-300/70 rounded-md text-[9px] shadow-2xs">
                    <div class="flex items-center gap-1">
                        <span class="font-bold text-slate-600">Regd. No. :</span>
                        <span class="font-black text-[#0c1938]">({{ $student->certificate->regd_no }})</span>
                    </div>
                    <span class="text-amber-400 font-bold">&#8226;</span>
                    <div class="flex items-center gap-1">
                        <span class="font-bold text-slate-600">Sl. No. :</span>
                        <span class="font-black text-[#0c1938]">{{ $student->certificate->sl_no }}</span>
                    </div>
                </div>
            </div>

            <!-- ================= 2. MAIN BODY (CENTERED WITHIN SAFE BOUNDARY) ================= -->
            <div class="w-full my-auto">
                <div class="max-w-[785px] mx-auto flex flex-col justify-center">                    <!-- A. HEADER: TOP LAUREL CREST + INSTITUTE TITLE + ADDRESS -->
                    <div class="flex flex-col items-center justify-center w-full text-center px-3">
                        <!-- Official Institute Logo Crest -->
                        <div class="flex justify-center items-center mb-1">
                            <img src="{{ asset('assets/images/logonewblack.webp') }}?v={{ time() }}" alt="SMTTC Logo" class="w-36 h-36 object-contain drop-shadow-md">
                        </div>

                        <!-- Institute Name -->
                        <h1 class="font-['Cinzel'] font-black text-[23px] tracking-[0.03em] text-[#0c1938] leading-tight drop-shadow-2xs">
                            SMART TECHNICAL TRAINING CENTRE
                        </h1>
                        <!-- Address -->
                        <p class="font-['Montserrat'] font-bold text-[9.5px] tracking-[0.14em] text-slate-600 uppercase mt-0.5">
                            NEAR HI-TECH HOSPITAL, SAGUNA MORE, PATNA-801503
                        </p>
                    </div>

                    <!-- B. CERTIFICATE TITLE -->
                    <div class="text-center mt-2">
                        <h2 class="font-['Cinzel'] font-black text-[30px] tracking-[0.24em] text-[#0c1938] leading-none drop-shadow-2xs">
                            CERTIFICATE
                        </h2>

                        <!-- Decorative Gold Divider Line with OF TRAINING COMPLETION -->
                        <div class="flex items-center justify-center gap-3 my-1">
                            <div class="h-[1.5px] w-24 bg-gradient-to-r from-transparent via-[#d4af37] to-[#d4af37]"></div>
                            <div class="flex items-center gap-1.5 text-[#a47116]">
                                <span class="text-[7px]">&#9670;</span>
                                <span class="font-['Cinzel'] font-bold text-[10.5px] tracking-[0.25em] text-[#855800] uppercase">
                                    OF TRAINING COMPLETION
                                </span>
                                <span class="text-[7px]">&#9670;</span>
                            </div>
                            <div class="h-[1.5px] w-24 bg-gradient-to-l from-transparent via-[#d4af37] to-[#d4af37]"></div>
                        </div>

                        <p class="font-['Montserrat'] font-semibold text-[10px] tracking-[0.22em] text-slate-500 uppercase mt-0.5">
                            THIS IS TO CERTIFY THAT MR. / MISS.
                        </p>
                    </div>

                    <!-- C. STUDENT NAME -->
                    <div class="text-center my-0.5">
                        <div class="font-['Great_Vibes'] text-[43px] text-[#0c1938] leading-tight tracking-wide font-normal drop-shadow-2xs">
                            {{ ucwords(strtolower($student->certificate->name)) }}
                        </div>
                        <!-- Gold Underline Flourish Ornament -->
                        <div class="flex justify-center items-center -mt-1">
                            <svg class="w-48 h-3 text-[#d4af37]" viewBox="0 0 200 12" fill="none">
                                <path d="M0,6 Q50,0 100,6 T200,6" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                <circle cx="100" cy="6" r="2.5" fill="#a47116"/>
                                <circle cx="85" cy="1.5" r="1.5" fill="#d4af37"/>
                                <circle cx="115" cy="1.5" r="1.5" fill="#d4af37"/>
                            </svg>
                        </div>
                    </div>

                    <!-- D. BODY STATEMENTS & COURSE DETAILS -->
                    <div class="text-center space-y-1.5 max-w-[670px] mx-auto px-2 mt-0.5">
                        <!-- Father's Name & DOB -->
                        <div class="text-[12px] font-['Montserrat'] text-slate-700 font-medium">
                            Son / Daughter of Mrs. 
                            <span class="font-bold text-[#0c1938] uppercase border-b border-slate-300 pb-0.5 px-1.5">
                                {{ $fatherName }}
                            </span>
                            <span class="mx-3 text-slate-400">|</span>
                            Date of Birth : 
                            <span class="font-bold text-[#0c1938] border-b border-slate-300 pb-0.5 px-1.5">
                                {{ $student->certificate->dob ? \Carbon\Carbon::parse($student->certificate->dob)->format('d.m.Y') : '—' }}
                            </span>
                        </div>

                        <!-- Completed Training in Course Name -->
                        <div class="text-[12px] font-['Montserrat'] text-slate-700 font-medium">
                            completed Training in 
                            <span class="font-['Cinzel'] font-extrabold text-[15px] text-[#0c1938] tracking-wide px-2.5 py-0.5 border-b-2 border-[#d4af37]">
                                {{ strtoupper($student->certificate->course) }}
                            </span>
                        </div>

                        <!-- Practical Test statement -->
                        <div class="text-[11px] font-['Montserrat'] text-slate-600 italic">
                            having successfully completed all the requirement and Practical Test of the Training Course has been Awarded
                        </div>

                        <!-- Period of Training & Institution Sign-off -->
                        <div class="flex items-center justify-between text-[11.5px] font-['Montserrat'] pt-1 px-2">
                            <div>
                                <span class="font-semibold text-slate-600">Period of Training : From</span>
                                <span class="font-bold text-[#0c1938] border-b border-slate-300 pb-0.5 px-1">
                                    {{ $student->certificate->from_date ? \Carbon\Carbon::parse($student->certificate->from_date)->format('d.m.Y') : '—' }}
                                </span>
                                <span class="font-semibold text-slate-600">to</span>
                                <span class="font-bold text-[#0c1938] border-b border-slate-300 pb-0.5 px-1">
                                    {{ $student->certificate->to_date ? \Carbon\Carbon::parse($student->certificate->to_date)->format('d.m.Y') : '—' }}
                                </span>
                            </div>
                            <div class="font-bold text-[11.5px] text-[#0c1938] tracking-wide">
                                For A to Z Smart Technical Training Centre
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ================= 3. BOTTOM: SIGNATURES & ACCREDITATION SEALS (ISO + IAF IN CENTER) ================= -->
            <div class="w-full pb-6">
                <div class="max-w-[560px] mx-auto flex items-end justify-between px-2">
                    <!-- Left: Training Incharge Signature -->
                    <div class="text-center flex flex-col items-center w-36">
                        <div class="h-10 flex items-center justify-center">
                            @if($certInchargeSig)
                                <img src="{{ asset($certInchargeSig) }}" class="max-h-10 object-contain">
                            @else
                                <span class="font-['Great_Vibes'] text-2xl text-slate-800">Signature</span>
                            @endif
                        </div>
                        <div class="w-32 h-[1.5px] bg-slate-600 mt-1"></div>
                        <div class="font-['Montserrat'] font-bold text-[10px] text-[#0c1938] tracking-wider mt-1.5 uppercase whitespace-nowrap">
                            Training Incharge
                        </div>
                    </div>

                    <!-- Center: ISO 9001:2015 & IAF Accredited Badges Side-by-Side (Replacing the medal badge) -->
                    <div class="flex items-center justify-center gap-4 shrink-0 pb-1">
                        <!-- ISO 9001:2015 Certified Logo Badge -->
                        <div class="w-[78px] h-[78px] shrink-0 flex items-center justify-center drop-shadow-lg transition-transform hover:scale-105" title="ISO 9001:2015 Certified">
                            <img src="{{ asset('assets/images/iso-9001-badge.svg') }}?v={{ time() }}" alt="ISO 9001:2015 Certified" class="w-full h-full object-contain">
                        </div>

                        <!-- IAF Accredited Logo Badge -->
                        <div class="w-[78px] h-[78px] shrink-0 flex items-center justify-center drop-shadow-lg transition-transform hover:scale-105" title="IAF Accredited">
                            <img src="{{ asset('assets/images/iaf-logo-badge.svg') }}?v={{ time() }}" alt="IAF Accredited" class="w-full h-full object-contain">
                        </div>
                    </div>

                    <!-- Right: Authorised Signatory Signature -->
                    <div class="text-center flex flex-col items-center w-36">
                        <div class="h-10 flex items-center justify-center">
                            @if($certSignature)
                                <img src="{{ asset($certSignature) }}" class="max-h-10 object-contain">
                            @else
                                <span class="font-['Great_Vibes'] text-2xl text-slate-800">Signature</span>
                            @endif
                        </div>
                        <div class="w-32 h-[1.5px] bg-slate-600 mt-1"></div>
                        <div class="font-['Montserrat'] font-bold text-[10px] text-[#0c1938] tracking-wider mt-1.5 uppercase whitespace-nowrap">
                            Authorised Signatory
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
