<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Certificate | {{ $student->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Playfair+Display:ital,wght@0,500;0,600;1,500;1,600&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0b2545;
            --navy-deep: #081a33;
            --ink: #1e2a3a;
            --slate: #5b6b7f;
            --brass-dark: #8a6a2e;
            --brass: #c19a49;
            --brass-light: #e8d5a8;
            --paper: #fbf7ef;
            --paper-deep: #f6efdf;
            --emerald: #17493c;
            --clay: #c4622d;
        }

        body {
            background-color: #e9edf2;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-family: 'Inter', sans-serif;
        }

        .certificate-container {
            width: 297mm;
            height: 210mm;
            background:
                radial-gradient(ellipse at 50% 8%, rgba(193,154,73,0.06), transparent 45%),
                linear-gradient(180deg, var(--paper) 0%, var(--paper-deep) 100%);
            position: relative;
            box-shadow: 0 30px 70px rgba(8, 26, 51, 0.18);
            overflow: hidden;
            border-radius: 3px;
            user-select: none;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Fine engraved guilloché rosette — replaces the oversized icon watermark */
        .guilloche {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 640px;
            height: 640px;
            opacity: 0.05;
            pointer-events: none;
            z-index: 0;
        }

        /* Hairline engine-turned texture across the field */
        .security-pattern {
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(115deg, rgba(11,37,69,0.015) 0px, rgba(11,37,69,0.015) 1px, transparent 1px, transparent 9px);
            pointer-events: none;
            z-index: 0;
        }

        @media print {
            @page { size: A4 landscape; margin: 0; }
            body {
                background-color: white;
                margin: 0 !important;
                padding: 0 !important;
                width: 100%;
                height: 100%;
                display: block !important;
            }
            .certificate-container {
                margin: 0 !important;
                box-shadow: none !important;
                border-radius: 0 !important;
                width: 297mm;
                height: 209mm;
                page-break-after: avoid;
                page-break-inside: avoid;
                overflow: hidden;
            }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="print:py-0 py-10">

    <!-- Top Actions panel (hidden in print) -->
    <div class="no-print mb-6 flex gap-4">
        <a href="{{ url('/') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-100 font-bold text-gray-700 transition duration-150 flex items-center gap-2 shadow-sm bg-white">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
        <button onclick="window.print()" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold shadow-lg shadow-blue-500/20 transition duration-150 flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Print Certificate
        </button>
    </div>

    @php
        $certInchargeSig = \App\Models\Setting::where('key', 'cert_incharge_signature')->value('value');
        $certSignature = \App\Models\Setting::where('key', 'cert_signature')->value('value');
    @endphp

    <div class="certificate-container">
        <div class="security-pattern"></div>

        <!-- Guilloché rosette watermark -->
        <svg class="guilloche" viewBox="0 0 640 640" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke="#8a6a2e" stroke-width="1">
                <circle cx="320" cy="320" r="300"/>
                <circle cx="320" cy="320" r="270"/>
                <circle cx="320" cy="320" r="240"/>
                <circle cx="320" cy="320" r="210"/>
                <circle cx="320" cy="320" r="180"/>
                <circle cx="320" cy="320" r="150"/>
                <circle cx="320" cy="320" r="120"/>
                <circle cx="320" cy="320" r="90"/>
                <circle cx="320" cy="320" r="60"/>
            </g>
            <g fill="none" stroke="#8a6a2e" stroke-width="0.75">
                @for ($i = 0; $i < 24; $i++)
                    <line x1="320" y1="320"
                          x2="{{ 320 + 300 * cos($i * pi() / 12) }}"
                          y2="{{ 320 + 300 * sin($i * pi() / 12) }}"/>
                @endfor
            </g>
        </svg>

        <!-- Ornate Vector Border Frame -->
        <svg class="absolute inset-0 w-full h-full pointer-events-none select-none z-0" viewBox="0 0 1122 793" fill="none" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="brass-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#8a6a2e" />
                    <stop offset="50%" stop-color="#c19a49" />
                    <stop offset="100%" stop-color="#8a6a2e" />
                </linearGradient>
                <linearGradient id="brass-grad-soft" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#c19a49" stop-opacity="0.55" />
                    <stop offset="100%" stop-color="#c19a49" stop-opacity="0.15" />
                </linearGradient>
            </defs>

            <rect x="24" y="24" width="1074" height="745" rx="2" stroke="url(#brass-grad)" stroke-width="3" />
            <rect x="34" y="34" width="1054" height="725" rx="2" stroke="url(#brass-grad)" stroke-width="0.75" />

            <!-- Restrained corner marks, drafting-square style (nods to technical training) -->
            <g stroke="url(#brass-grad)" stroke-width="1.5" fill="none">
                <path d="M24 70 L24 24 L70 24"/>
                <path d="M1098 70 L1098 24 L1052 24"/>
                <path d="M24 723 L24 769 L70 769"/>
                <path d="M1098 723 L1098 769 L1052 769"/>
            </g>
            <g fill="url(#brass-grad)">
                <circle cx="46" cy="46" r="2.5"/>
                <circle cx="1076" cy="46" r="2.5"/>
                <circle cx="46" cy="747" r="2.5"/>
                <circle cx="1076" cy="747" r="2.5"/>
            </g>
        </svg>

        <!-- 1. Header -->
        <div class="pt-9 px-16 relative z-10 flex justify-between items-start">
            <div class="text-[11px] text-[var(--ink)] font-semibold tracking-wide w-[190px] pt-1">
                Regd. No.
                <div class="font-bold text-[var(--navy)] text-[13px] mt-0.5">{{ $student->certificate->regd_no }}</div>
            </div>

            <div class="text-center grow px-4">
                <div class="text-[10px] font-bold text-[var(--brass-dark)] tracking-[0.28em] uppercase mb-2">
                    An ISO 9001:2015 Certified Institute
                </div>
                <div class="flex items-center justify-center gap-3 mb-1">
                    <!-- Cleaner house+tool mark, single weight, no drop-shadow clip-art feel -->
                    <svg width="34" height="34" viewBox="0 0 40 40" fill="none">
                        <path d="M20 5 L35 17 V34 H5 V17 Z" stroke="#0F5A9A" stroke-width="2" fill="none" stroke-linejoin="round"/>
                        <rect x="16" y="22" width="8" height="12" fill="#0F5A9A"/>
                        <path d="M13 13 L18 18 M18 13 L13 18" stroke="#c4622d" stroke-width="2.2" stroke-linecap="round"/>
                    </svg>
                    <h1 class="text-[32px] font-black tracking-wide leading-none" style="font-family: 'Cinzel', serif;">
                        <span class="text-[var(--navy)]">A TO Z SMART TECHNICAL</span> <span class="text-[var(--clay)]">TRAINING CENTER</span>
                    </h1>
                </div>
                <div class="text-[9px] font-bold text-[var(--slate)] uppercase tracking-[0.18em]">
                    Near Hi-Tech Hospital saguna more Balaji Nagar new Tarachak danapur patna bihar 801503

                </div>
            </div>

            <div class="text-[11px] text-[var(--ink)] font-semibold tracking-wide w-[190px] text-right pt-1">
                Sl. No.
                <div class="font-bold text-[var(--navy)] text-[13px] mt-0.5">{{ $student->certificate->sl_no }}</div>
            </div>
        </div>

        <!-- 2. Seals row -->
        <div class="flex justify-center items-center gap-16 mt-2 relative z-10">
            <!-- ISO Seal -->
            <svg viewBox="0 0 100 100" class="w-[64px] h-[64px]">
                <circle cx="50" cy="50" r="46" fill="var(--navy-deep)" stroke="url(#brass-grad)" stroke-width="2.5" />
                <circle cx="50" cy="50" r="40" fill="none" stroke="url(#brass-grad)" stroke-width="0.6" stroke-dasharray="1.5,2.5" />
                <text x="50" y="40" font-family="'Cinzel', serif" font-size="11" font-weight="700" fill="#fff" text-anchor="middle" letter-spacing="1.5">ISO</text>
                <line x1="34" y1="47" x2="66" y2="47" stroke="url(#brass-grad)" stroke-width="0.75"/>
                <text x="50" y="58" font-family="'Inter', sans-serif" font-size="7.5" font-weight="700" fill="var(--brass-light)" text-anchor="middle">9001:2015</text>
                <path d="M36 70 L45 78 L64 61" fill="none" stroke="url(#brass-grad)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>

            <!-- Center crest -->
            <svg viewBox="0 0 100 100" class="w-[80px] h-[80px]">
                <circle cx="50" cy="50" r="47" fill="var(--emerald)" stroke="url(#brass-grad)" stroke-width="2.5" />
                <circle cx="50" cy="50" r="41" fill="none" stroke="url(#brass-grad)" stroke-width="0.6"/>
                <path d="M 24 52 C 24 38, 34 27, 50 27" stroke="url(#brass-grad)" stroke-width="1" fill="none"/>
                <path d="M 76 52 C 76 38, 66 27, 50 27" stroke="url(#brass-grad)" stroke-width="1" fill="none"/>
                <ellipse cx="26" cy="44" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(-30 26 44)"/>
                <ellipse cx="31" cy="34" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(-45 31 34)"/>
                <ellipse cx="40" cy="28" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(-65 40 28)"/>
                <ellipse cx="74" cy="44" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(30 74 44)"/>
                <ellipse cx="69" cy="34" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(45 69 34)"/>
                <ellipse cx="60" cy="28" rx="3" ry="5.5" fill="url(#brass-grad)" transform="rotate(65 60 28)"/>
                <text x="50" y="57" font-family="'Cinzel', serif" font-size="24" font-weight="700" fill="url(#brass-grad)" text-anchor="middle">RS</text>
                <text x="50" y="70" font-family="'Inter', sans-serif" font-size="3.4" font-weight="700" fill="#fff" text-anchor="middle" letter-spacing="1">A TO Z SMART TECHNICAL</text>
                <text x="50" y="76" font-family="'Inter', sans-serif" font-size="3.4" font-weight="700" fill="#fff" text-anchor="middle" letter-spacing="1">TRAINING CENTER</text>
            </svg>

            <!-- IAF Seal -->
            <svg viewBox="0 0 100 100" class="w-[64px] h-[64px]">
                <circle cx="50" cy="50" r="46" fill="var(--navy-deep)" stroke="url(#brass-grad)" stroke-width="2.5" />
                <circle cx="50" cy="50" r="40" fill="none" stroke="url(#brass-grad)" stroke-width="0.6" stroke-dasharray="1.5,2.5" />
                <text x="50" y="42" font-family="'Cinzel', serif" font-size="14" font-weight="700" fill="#fff" text-anchor="middle" letter-spacing="1">IAF</text>
                <line x1="34" y1="47" x2="66" y2="47" stroke="url(#brass-grad)" stroke-width="0.75"/>
                <text x="50" y="59" font-family="'Inter', sans-serif" font-size="5.5" font-weight="700" fill="var(--brass-light)" text-anchor="middle" letter-spacing="0.5">MULTILATERAL</text>
                <text x="50" y="66" font-family="'Inter', sans-serif" font-size="5.5" font-weight="700" fill="#fff" text-anchor="middle" letter-spacing="0.5">RECOGNITION</text>
            </svg>
        </div>

        <!-- 3. Title -->
        <div class="relative w-[360px] h-[46px] mx-auto flex items-center justify-center z-10 mt-3">
            <div class="absolute inset-0 flex items-center">
                <div class="h-[1px] w-full bg-gradient-to-r from-transparent via-[var(--brass)] to-transparent"></div>
            </div>
            <span class="relative bg-[var(--paper)] px-8 font-bold text-[19px] tracking-[0.35em] text-[var(--navy)] uppercase" style="font-family: 'Cinzel', serif;">
                Certificate
            </span>
        </div>

        <!-- 4. Body -->
        <div class="text-center relative z-10 max-w-[920px] mx-auto flex flex-col justify-center items-center flex-grow py-2">
            <p class="text-[11px] font-bold tracking-widest text-[var(--slate)] uppercase">
                This is to certify that Mr. / Ms.
            </p>

            <div class="text-[27px] font-semibold my-2 pb-1 px-10 text-[var(--navy)] tracking-wide inline-block border-b-2 border-[var(--brass)]/40" style="font-family: 'Playfair Display', serif; font-style: italic;">
                {{ $student->certificate->name }}
            </div>

            <div class="flex justify-center items-center gap-10 mt-1 text-[12px] text-[var(--ink)]">
                <div>
                    <span class="text-[var(--slate)] font-bold uppercase text-[9.5px] tracking-wider block mb-0.5">Son / Daughter of</span>
                    <span class="font-bold text-[var(--ink)] border-b border-slate-300 px-3 pb-0.5 text-[13.5px]">
                        {{ $student->certificate->father_name }}
                    </span>
                </div>
                <div>
                    <span class="text-[var(--slate)] font-bold uppercase text-[9.5px] tracking-wider block mb-0.5">Date of Birth</span>
                    <span class="font-bold text-[var(--ink)] border-b border-slate-300 px-3 pb-0.5 text-[13.5px]">
                        {{ $student->certificate->dob ? $student->certificate->dob->format('d.m.Y') : 'N/A' }}
                    </span>
                </div>
            </div>

            <p class="text-[11px] font-bold tracking-widest text-[var(--slate)] uppercase mt-4">
                Completed training on
            </p>

            <div class="text-[19px] font-bold my-1 text-[var(--emerald)] italic tracking-wide" style="font-family: 'Inter', sans-serif;">
                {{ $student->certificate->course }}
            </div>

            <p class="text-[9.5px] font-semibold tracking-wide uppercase text-[var(--slate)] max-w-[680px] mx-auto leading-relaxed mt-1">
                Having successfully completed all requirements and the practical test of the training centre, is hereby awarded this certificate.
            </p>

            <div class="flex flex-wrap justify-center items-center gap-x-2 gap-y-1.5 mt-4 text-[12px] text-[var(--ink)]">
                <span class="text-[var(--slate)] font-bold uppercase text-[9.5px] tracking-wider">Period of Training</span>
                <span class="text-[var(--slate)] font-semibold uppercase text-[9.5px]">from</span>
                <span class="font-bold text-[var(--ink)] border-b border-slate-300 px-2 pb-0.5">
                    {{ $student->certificate->from_date ? $student->certificate->from_date->format('d.m.Y') : 'N/A' }}
                </span>
                <span class="text-[var(--slate)] font-semibold uppercase text-[9.5px]">to</span>
                <span class="font-bold text-[var(--ink)] border-b border-slate-300 px-2 pb-0.5">
                    {{ $student->certificate->to_date ? $student->certificate->to_date->format('d.m.Y') : 'N/A' }}
                </span>
                <span class="text-[var(--slate)] font-semibold uppercase text-[9.5px]">at</span>
                <span class="font-bold text-[var(--ink)] border-b border-slate-300 px-2 pb-0.5">
                    {{ $student->certificate->center }}
                </span>
                <span class="font-bold border-b border-slate-300 px-2 pb-0.5 text-[var(--clay)] italic text-[11.5px] tracking-wider">
                    For {{ $student->certificate->location }}
                </span>
            </div>
        </div>

        <!-- 5. Footer -->
        <div class="pb-9 px-16 relative z-10 flex justify-between items-end">
            <div class="text-center w-[160px]">
                <div class="font-bold text-[var(--ink)] text-[13px] border-b border-slate-400 pb-1 mb-1" style="font-family: 'Inter', sans-serif;">
                    {{ $student->certificate->issued_date ? $student->certificate->issued_date->format('d.m.Y') : 'N/A' }}
                </div>
                <div class="text-[9px] font-bold text-[var(--slate)] uppercase tracking-wider">Date of Issue</div>
            </div>

            <div class="text-center w-[180px] flex flex-col items-center">
                <div class="h-14 flex items-end justify-center mb-1">
                    @if($certInchargeSig)
                        <img src="{{ asset($certInchargeSig) }}" class="max-h-14 max-w-[130px] object-contain">
                    @else
                        <div class="h-5 w-20 border-b border-dashed border-slate-300"></div>
                    @endif
                </div>
                <div class="w-full border-t border-slate-400"></div>
                <div class="text-[9px] font-bold text-[var(--slate)] uppercase tracking-wider mt-1">Training Incharge</div>
            </div>

            <div class="text-center w-[180px] flex flex-col items-center">
                <div class="h-14 flex items-end justify-center mb-1">
                    @if($certSignature)
                        <img src="{{ asset($certSignature) }}" class="max-h-14 max-w-[130px] object-contain">
                    @else
                        <div class="h-5 w-20 border-b border-dashed border-slate-300"></div>
                    @endif
                </div>
                <div class="w-full border-t border-slate-400"></div>
                <div class="text-[9px] font-bold text-[var(--slate)] uppercase tracking-wider mt-1">Authorised Signatory</div>
            </div>
        </div>
    </div>

</body>
</html>
