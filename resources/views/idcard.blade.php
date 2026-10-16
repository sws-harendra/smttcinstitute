<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Card - {{ $student->name }} | SMTTC Institute</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN for instant rendering -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #eef2f6;
        }

        /* Standard CR80 Vertical Card Dimensions: 54mm x 86mm - Clean White Plastic Card */
        .id-card-frame {
            width: 330px;
            height: 520px;
            border-radius: 16px;
            position: relative;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 15px 35px -8px rgba(12, 25, 56, 0.15), 0 0 0 1px rgba(212, 175, 55, 0.4), 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        /* Subtle Security Guilloche Pattern Watermark for White Card */
        .security-pattern {
            background-image: 
                radial-gradient(rgba(12, 25, 56, 0.035) 1px, transparent 1px), 
                radial-gradient(rgba(212, 175, 55, 0.05) 1px, transparent 1px);
            background-size: 16px 16px;
            background-position: 0 0, 8px 8px;
        }

        /* Gold Foil Gradient Elements */
        .gold-foil-bg {
            background: linear-gradient(135deg, #fceda2 0%, #d4af37 40%, #b88a14 70%, #f7dc79 100%);
        }

        /* Realistic Barcode CSS Pattern */
        .barcode-strip {
            background: repeating-linear-gradient(
                90deg,
                #0c1938 0px,
                #0c1938 2px,
                transparent 2px,
                transparent 4px,
                #0c1938 4px,
                #0c1938 7px,
                transparent 7px,
                transparent 8px,
                #0c1938 8px,
                #0c1938 11px,
                transparent 11px,
                transparent 14px,
                #0c1938 14px,
                #0c1938 15px,
                transparent 15px,
                transparent 18px
            );
            height: 28px;
            width: 100%;
        }

        /* Print Specific Rules for ID Card Sticker Printing (Front & Back on 1 Sheet) */
        @media print {
            @page {
                size: auto;
                margin: 6mm;
            }
            html, body {
                width: 100% !important;
                height: auto !important;
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }
            .no-print {
                display: none !important;
            }
            .print-sheet {
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                align-items: flex-start !important;
                gap: 6mm !important;
                margin: 4mm auto !important;
                padding: 0 !important;
                width: 100% !important;
                page-break-inside: avoid !important;
            }
            .card-wrapper {
                display: block !important;
                page-break-inside: avoid !important;
                page-break-after: avoid !important;
            }
            .sticker-cut-box {
                width: 54mm !important;
                height: 86mm !important;
                position: relative !important;
                overflow: hidden !important;
                border: 1.2px dashed #475569 !important; /* Visible dashed line for scissor / punch cut! */
                border-radius: 3.2mm !important; /* PVC card rounded corners guideline */
                box-shadow: none !important;
                background: white !important;
            }
            .id-card-frame {
                width: 330px !important;
                height: 520px !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                transform-origin: 0 0 !important;
                transform: scale(calc(54mm / 330px)) !important;
                box-shadow: none !important;
                border: none !important;
            }
            .sticker-hint {
                display: block !important;
                font-size: 7.5pt !important;
                font-weight: 700 !important;
                text-align: center !important;
                color: #475569 !important;
                margin-bottom: 2mm !important;
                text-transform: uppercase !important;
                letter-spacing: 0.5px !important;
            }

            /* Single Sticker Modes */
            body.print-only-front .back-card-wrapper {
                display: none !important;
            }
            body.print-only-back .front-card-wrapper {
                display: none !important;
            }

            /* Butterfly Foldable Mode (Zero Gap, touching in middle with center fold line) */
            body.print-butterfly .print-sheet {
                gap: 0 !important;
            }
            body.print-butterfly .front-card-wrapper .sticker-cut-box {
                border-right: 1px dashed #94a3b8 !important;
                border-top-right-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
            }
            body.print-butterfly .back-card-wrapper .sticker-cut-box {
                border-left: none !important;
                border-top-left-radius: 0 !important;
                border-bottom-left-radius: 0 !important;
            }
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 py-6 px-4 flex flex-col items-center justify-center">

    <!-- Success Alert -->
    @if(session('photo_success'))
        <div class="no-print max-w-4xl w-full mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-xs font-bold flex items-center justify-between shadow-xs">
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                {{ session('photo_success') }}
            </span>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold">&times;</button>
        </div>
    @endif

    <!-- ================= TOP ACTION BAR (Hidden when Printing) ================= -->
    <div class="no-print max-w-4xl w-full mb-6 flex flex-wrap items-center justify-between gap-4 bg-white border border-slate-200 rounded-2xl p-4 shadow-md">
        <div class="flex items-center gap-3">
            <a href="{{ url('/') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition duration-150 flex items-center gap-2 border border-slate-200">
                <i class="fa-solid fa-arrow-left text-amber-600"></i> Home
            </a>
            @if(session('student_logged_in'))
                <a href="{{ route('student.dashboard') }}" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition duration-150 flex items-center gap-2 border border-slate-200">
                    <i class="fa-solid fa-id-badge text-indigo-600"></i> Dashboard
                </a>
            @endif

            <!-- Direct Upload Photo Button -->
            <button type="button" onclick="document.getElementById('photoInput').click()" class="px-3.5 py-2 rounded-xl bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold text-xs transition flex items-center gap-1.5 border border-indigo-200" title="Upload or change student passport photo">
                <i class="fa-solid fa-camera text-indigo-600"></i> Upload Photo
            </button>
        </div>

        <!-- Hidden Photo Upload Form -->
        <form id="photoUploadForm" action="{{ route('idcard.uploadPhoto', $student->enrollment_no) }}" method="POST" enctype="multipart/form-data" class="hidden">
            @csrf
            <input type="file" id="photoInput" name="photo" accept="image/jpeg,image/png,image/jpg,image/webp" onchange="document.getElementById('photoUploadForm').submit()">
        </form>

        <!-- Sticker Print Action Buttons -->
        <div class="flex flex-wrap items-center gap-2">
            <!-- 1. Print Sticker Sheet (Both Sides on 1 Page) -->
            <button onclick="printSticker('both')" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 via-yellow-500 to-amber-600 hover:from-amber-600 hover:to-yellow-600 text-slate-950 font-black text-xs sm:text-sm shadow-md transition flex items-center gap-2 cursor-pointer border border-amber-400" title="Print Front & Back stickers side-by-side on 1 single sticker sheet">
                <i class="fa-solid fa-note-sticky text-slate-900"></i> Print Sticker (1 Page)
            </button>

            <!-- 2. Foldable Butterfly Sticker Mode -->
            <button onclick="printSticker('butterfly')" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1.5 border border-slate-200" title="Connected Front & Back with center fold line to wrap over blank PVC card">
                <i class="fa-solid fa-arrows-left-right text-amber-600"></i> Foldable (Butterfly)
            </button>

            <!-- 3. Front Sticker Only -->
            <button onclick="printSticker('front')" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1.5 border border-slate-200" title="Print Front sticker only">
                <i class="fa-solid fa-image text-indigo-600"></i> Front Only
            </button>

            <!-- 4. Back Sticker Only -->
            <button onclick="printSticker('back')" class="px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition flex items-center gap-1.5 border border-slate-200" title="Print Back sticker only">
                <i class="fa-solid fa-file-lines text-slate-500"></i> Back Only
            </button>
        </div>
    </div>

    <!-- JavaScript Sticker Print Controller -->
    <script>
        function printSticker(mode) {
            document.body.classList.remove('print-only-front', 'print-only-back', 'print-butterfly');
            if (mode === 'front') {
                document.body.classList.add('print-only-front');
            } else if (mode === 'back') {
                document.body.classList.add('print-only-back');
            } else if (mode === 'butterfly') {
                document.body.classList.add('print-butterfly');
            }
            
            setTimeout(function() {
                window.print();
            }, 100);
        }

        window.onafterprint = function() {
            document.body.classList.remove('print-only-front', 'print-only-back', 'print-butterfly');
        };
    </script>

    <!-- ================= CARD DISPLAY CONTAINER ================= -->
    <div class="print-sheet flex flex-col lg:flex-row items-center justify-center gap-8 max-w-5xl w-full my-auto">

        <!-- ========================================================================= -->
        <!-- 1. FRONT SIDE OF ID CARD (WHITE THEME) -->
        <!-- ========================================================================= -->
        <div class="card-wrapper front-card-wrapper flex flex-col items-center">
            <div class="no-print mb-2 text-xs font-bold tracking-widest uppercase text-slate-600 flex items-center gap-1.5">
                <i class="fa-solid fa-id-card text-indigo-600"></i> Front View
            </div>
            <div class="hidden sticker-hint">✂ Front Sticker (54mm × 86mm)</div>

            <div class="sticker-cut-box">
                <div class="id-card-frame select-none flex flex-col justify-between">
                    <!-- Background Subtle Geometric Pattern Watermark -->
                    <div class="absolute inset-0 security-pattern pointer-events-none"></div>
                    
                    <!-- Corner Geometric Decorative Swooshes (Subtle & Elegant) -->
                    <div class="absolute -top-12 -left-12 w-28 h-28 rounded-full bg-amber-400/10 pointer-events-none blur-lg"></div>
                    <div class="absolute -bottom-12 -right-12 w-28 h-28 rounded-full bg-indigo-500/5 pointer-events-none blur-lg"></div>

                    <!-- ---------------- A. TOP INSTITUTION HEADER ---------------- -->
                    <div class="relative z-10 pt-3.5 px-3 text-center">
                        <div class="flex items-center justify-center gap-2.5">
                            <!-- SMTTC Golden Shield Crest Logo -->
                            <img src="{{ asset('assets/images/logonewblack.webp') }}?v={{ time() }}" alt="SMTTC Logo" class="w-12 h-12 object-contain drop-shadow-sm">
                            <div class="text-left">
                                <!-- Removed "A TO Z" as requested -->
                                <h1 class="font-['Cinzel'] font-black text-[14px] tracking-wide text-[#0c1938] leading-tight drop-shadow-2xs">
                                    SMART TECHNICAL
                                </h1>
                                <p class="font-['Cinzel'] font-extrabold text-[11px] tracking-[0.08em] text-[#a47116] leading-tight">
                                    TRAINING CENTRE
                                </p>
                            </div>
                        </div>

                        <!-- ISO Certification Tagline Pill -->
                        <div class="mt-1.5 inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-amber-50/90 border border-amber-300 text-[7px] font-extrabold tracking-widest text-[#7a4e00] uppercase shadow-2xs">
                            <i class="fa-solid fa-star text-[5.5px] text-amber-500"></i>
                            <span>AN ISO 9001:2015 CERTIFIED INSTITUTE</span>
                            <i class="fa-solid fa-star text-[5.5px] text-amber-500"></i>
                        </div>

                        <!-- Title Strip -->
                        <div class="mt-2 w-full py-1 bg-gradient-to-r from-[#0c1938] via-[#1a2d5a] to-[#0c1938] text-amber-300 font-['Cinzel'] font-black text-[10px] tracking-[0.2em] uppercase rounded-sm shadow-sm flex items-center justify-center gap-2 border-y border-amber-400/40">
                            <span>STUDENT IDENTITY CARD</span>
                        </div>
                    </div>

                <!-- ---------------- B. STUDENT PHOTO & PRIMARY DETAILS ---------------- -->
                <div class="relative z-10 px-4 flex flex-col items-center">
                    <!-- Photo Frame with Gold Bevel (Click to Upload/Change) -->
                    <div class="relative mb-2 group">
                        <div class="w-24 h-28 rounded-xl p-[2px] gold-foil-bg shadow-md">
                            <div class="w-full h-full rounded-[10px] overflow-hidden bg-white flex items-center justify-center relative">
                                @if($student->photo)
                                    @php
                                        $photoSrc = Str::startsWith($student->photo, 'http') ? $student->photo : (Str::startsWith($student->photo, '/') ? $student->photo : asset($student->photo));
                                    @endphp
                                    <img src="{{ $photoSrc }}" alt="{{ $student->name }}" class="w-full h-full object-cover object-top" onerror="this.onerror=null; this.src='/assets/images/placeholder-user.jpg';">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-b from-slate-50 to-indigo-50/50 text-[#0c1938]">
                                        <i class="fa-solid fa-user-graduate text-3xl text-indigo-900/80"></i>
                                        <span class="text-[8px] font-bold text-slate-500 uppercase mt-1">Photo</span>
                                    </div>
                                @endif

                                <!-- Interactive Upload Hover Button (Hidden in Print) -->
                                <button type="button" onclick="document.getElementById('photoInput').click()" class="no-print absolute inset-0 bg-[#0c1938]/70 text-white flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 cursor-pointer rounded-[10px]" title="Click to upload or change student photo">
                                    <i class="fa-solid fa-camera text-base text-amber-400 mb-0.5"></i>
                                    <span class="text-[8px] font-bold uppercase tracking-wider text-amber-200">Change Photo</span>
                                </button>
                            </div>
                        </div>
                        <!-- Mini SMTTC Hologram Seal on Photo Corner -->
                        <div class="absolute -bottom-2 -right-2 w-7 h-7 rounded-full gold-foil-bg p-[1.5px] shadow-sm flex items-center justify-center">
                            <div class="w-full h-full rounded-full bg-[#0c1938] flex items-center justify-center text-amber-400 text-[9px] font-black">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Student Name -->
                    <h2 class="font-['Montserrat'] font-black text-[15.5px] tracking-wide text-[#0c1938] uppercase text-center leading-tight">
                        {{ strtoupper($student->name) }}
                    </h2>

                    <!-- Enrollment ID Pill -->
                    <div class="mt-1 px-3 py-0.5 rounded-md bg-indigo-50 border border-indigo-200 text-[#0c1938] font-mono font-bold text-[10px] tracking-wider shadow-2xs">
                        ID: {{ $student->enrollment_no }}
                    </div>

                    <!-- Details Table / Rows (Clean White / Light Slate Theme) -->
                    <div class="w-full mt-2 bg-slate-50 border border-slate-200/80 rounded-xl p-2.5 space-y-1.5 text-[9px] shadow-2xs">
                        <!-- Course Name -->
                        <div class="flex items-center justify-between pb-1 border-b border-slate-200/70">
                            <span class="font-bold text-slate-500 uppercase tracking-wide flex items-center gap-1.5">
                                <i class="fa-solid fa-screwdriver-wrench text-amber-600 text-[8px]"></i> Course
                            </span>
                            <span class="font-extrabold text-[#0c1938] text-right max-w-[185px] leading-tight text-[8.5px] uppercase">
                                {{ $student->course }}
                            </span>
                        </div>

                        <!-- Father's Name -->
                        <div class="flex items-center justify-between pb-1 border-b border-slate-200/70">
                            <span class="font-semibold text-slate-500 uppercase tracking-wide flex items-center gap-1.5">
                                <i class="fa-solid fa-user text-indigo-600 text-[8px]"></i> Father
                            </span>
                            <span class="font-bold text-slate-800 text-right max-w-[170px] truncate uppercase">
                                {{ $student->father_name }}
                            </span>
                        </div>

                        <!-- DOB & Contact -->
                        <div class="flex items-center justify-between pb-1 border-b border-slate-200/70">
                            <span class="font-semibold text-slate-500 uppercase tracking-wide flex items-center gap-1.5">
                                <i class="fa-solid fa-calendar-day text-indigo-600 text-[8px]"></i> D.O.B
                            </span>
                            <span class="font-bold text-slate-800 text-right">
                                {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d.m.Y') : '—' }}
                            </span>
                        </div>

                        <!-- Mobile Number -->
                        <div class="flex items-center justify-between">
                            <span class="font-semibold text-slate-500 uppercase tracking-wide flex items-center gap-1.5">
                                <i class="fa-solid fa-phone text-indigo-600 text-[8px]"></i> Phone
                            </span>
                            <span class="font-bold text-slate-800 text-right font-mono">
                                {{ $student->mobile_no }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- ---------------- C. BOTTOM FOOTER WITH QR & VALIDITY ---------------- -->
                <div class="relative z-10 px-4 pb-3">
                    <div class="flex items-center justify-between pt-1">
                        <!-- Validity Date -->
                        <div class="text-left">
                            <p class="text-[7px] font-bold text-slate-400 uppercase tracking-widest">Valid Upto</p>
                            <p class="text-[10px] font-black text-[#0c1938] font-mono">{{ $student->valid_to }}</p>
                            <span class="inline-block mt-0.5 px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 text-[6.5px] font-extrabold uppercase tracking-wider">
                                Active Student
                            </span>
                        </div>

                        <!-- Dynamic QR Code (Scannable for Verification) -->
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-white p-0.5 rounded-md border border-slate-300 shadow-xs flex items-center justify-center">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ urlencode(route('idcard.view', $student->enrollment_no)) }}" alt="QR" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'%230c1938\'><path d=\'M3 3h8v8H3zm2 2v4h4V5zm8-2h8v8h-8zm2 2v4h4V5zM3 13h8v8H3zm2 2v4h4v-4zm13-2h3v2h-3zm-5 0h3v5h-3zm2 5h3v3h-3zm3-3h3v5h-3zm-5 3h2v2h-2z\'/></svg>';">
                            </div>
                            <span class="text-[6.5px] font-bold text-slate-500 mt-0.5 uppercase tracking-tighter">Scan to Verify</span>
                        </div>
                    </div>

                    <!-- Bottom Golden Color Bar -->
                    <div class="mt-2 pt-1 border-t border-slate-200 flex items-center justify-between text-[7px] text-slate-500 font-bold uppercase tracking-wider">
                        <span>SMTTC CAMPUS PATNA</span>
                        <span class="text-[#0c1938] font-mono tracking-tight">{{ $student->enrollment_no }}</span>
                    </div>
                </div>
            </div>
            </div>
        </div>


        <!-- ========================================================================= -->
        <!-- 2. BACK SIDE OF ID CARD (WHITE THEME) -->
        <!-- ========================================================================= -->
        <div class="card-wrapper back-card-wrapper flex flex-col items-center">
            <div class="no-print mb-2 text-xs font-bold tracking-widest uppercase text-slate-600 flex items-center gap-1.5">
                <i class="fa-solid fa-arrows-rotate text-indigo-600"></i> Back View
            </div>
            <div class="hidden sticker-hint">✂ Back Sticker (54mm × 86mm)</div>

            <div class="sticker-cut-box">
                <div class="id-card-frame select-none flex flex-col justify-between">
                <!-- Background Subtle Geometric Pattern Watermark -->
                <div class="absolute inset-0 security-pattern pointer-events-none"></div>

                <!-- ---------------- A. TOP HEADER BACK ---------------- -->
                <div class="relative z-10 pt-3.5 px-4 text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-circle-exclamation text-amber-600 text-xs"></i>
                        <h3 class="font-['Cinzel'] font-black text-[11px] tracking-widest text-[#0c1938] uppercase">
                            TERMS & REGULATIONS
                        </h3>
                    </div>
                    <div class="h-[1.5px] w-full bg-gradient-to-r from-transparent via-amber-400 to-transparent mt-1.5"></div>
                </div>

                <!-- ---------------- B. RULES & EMERGENCY INSTRUCTIONS ---------------- -->
                <div class="relative z-10 px-4 space-y-2 text-[8px] text-slate-700 leading-snug">
                    <div class="flex items-start gap-2 bg-slate-50 p-1.5 rounded-lg border border-slate-200/80">
                        <span class="font-black text-amber-600">1.</span>
                        <p class="font-medium">This card is non-transferable and remains the official property of SMTTC Institute.</p>
                    </div>

                    <div class="flex items-start gap-2 bg-slate-50 p-1.5 rounded-lg border border-slate-200/80">
                        <span class="font-black text-amber-600">2.</span>
                        <p class="font-medium">Carrying this ID card is compulsory while attending practical labs, theory sessions, and tests.</p>
                    </div>

                    <div class="flex items-start gap-2 bg-slate-50 p-1.5 rounded-lg border border-slate-200/80">
                        <span class="font-black text-amber-600">3.</span>
                        <p class="font-medium">In case of loss or theft, report immediately to the Institute Administrative Desk.</p>
                    </div>

                    <div class="flex items-start gap-2 bg-slate-50 p-1.5 rounded-lg border border-slate-200/80">
                        <span class="font-black text-amber-600">4.</span>
                        <p class="font-medium">Cardholder must surrender this card upon course completion or certificate issuance.</p>
                    </div>

                    <!-- Campus Address Box -->
                    <div class="mt-2.5 p-2 rounded-xl bg-indigo-50/60 border border-indigo-100 text-center">
                        <p class="font-bold text-[8.5px] text-[#0c1938] uppercase tracking-wide">
                            <i class="fa-solid fa-location-dot text-amber-600 mr-1"></i> SMTTC Campus Address
                        </p>
                        <p class="text-[7.5px] text-slate-600 font-medium mt-1 leading-tight">
                            Near Hi-Tech Hospital, Saguna More, Danapur Main Road, Patna, Bihar - 801503
                        </p>
                        <div class="mt-1 flex items-center justify-center gap-3 text-[7.5px] text-indigo-900 font-mono font-bold">
                            <span><i class="fa-solid fa-phone text-[6.5px]"></i> +91 91223 34455</span>
                            <span>&#8226;</span>
                            <span>www.smttcinstitute.com</span>
                        </div>
                    </div>
                </div>

                <!-- ---------------- C. SIGNATURE & BARCODE STRIP ---------------- -->
                <div class="relative z-10 px-4 pb-3">
                    <!-- High-Tech Barcode Box -->
                    <div class="bg-white p-2 rounded-lg text-center border border-slate-200 shadow-xs">
                        <div class="barcode-strip"></div>
                        <p class="text-[8px] font-mono font-black text-slate-900 tracking-[0.25em] mt-1">
                            *{{ $student->enrollment_no }}*
                        </p>
                    </div>

                    <!-- Authorized Signatory Stamp -->
                    <div class="mt-2 flex items-end justify-between pt-1">
                        <div class="text-left">
                            <p class="text-[6.5px] text-slate-400 uppercase font-semibold">Security Seal</p>
                            <span class="text-[7.5px] text-[#0c1938] font-bold uppercase tracking-wider">OFFICIAL SMTTC</span>
                        </div>

                        <div class="text-center flex flex-col items-center">
                            @php
                                $certSig = \App\Models\Setting::where('key', 'cert_signature')->value('value');
                            @endphp
                            <div class="h-6 flex items-center justify-center">
                                @if($certSig)
                                    <img src="{{ asset($certSig) }}" class="max-h-6 object-contain">
                                @else
                                    <span class="font-serif italic text-xs text-slate-800">Authorized</span>
                                @endif
                            </div>
                            <div class="w-24 h-[1px] bg-slate-300 mt-0.5"></div>
                            <p class="font-['Montserrat'] font-bold text-[7px] text-slate-600 uppercase tracking-wider mt-0.5">
                                Authorised Signatory
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div>

    </div>

</body>
</html>
