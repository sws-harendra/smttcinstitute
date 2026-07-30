<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official Certificate | {{ $student->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #cbd5e1;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-family: Arial, Helvetica, sans-serif;
        }

        .cert-scale-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: auto;
            padding: 1rem 0;
        }

        .cert-wrapper {
            width: 1024px;
            height: 768px;
            position: relative;
            background-image: url('{{ asset('assets/images/certificate-template.png') }}?v={{ time() }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            margin: 0 auto;
            transform-origin: top center;
        }

        @media screen and (max-width: 1060px) {
            .cert-wrapper {
                zoom: 0.85;
            }
        }
        @media screen and (max-width: 850px) {
            .cert-wrapper {
                zoom: 0.65;
            }
        }
        @media screen and (max-width: 640px) {
            .cert-wrapper {
                zoom: 0.48;
            }
        }
        @media screen and (max-width: 450px) {
            .cert-wrapper {
                zoom: 0.33;
            }
        }

        @media print {
            @page { size: A4 landscape; margin: 0; }
            body {
                background-color: white;
                margin: 0 !important;
                padding: 0 !important;
                width: 100%;
                height: 100%;
                display: flex !important;
                align-items: center;
                justify-content: center;
            }
            .cert-scale-container {
                overflow: visible !important;
                padding: 0 !important;
            }
            .cert-wrapper {
                box-shadow: none !important;
                width: 297mm !important;
                height: 210mm !important;
                zoom: 1 !important;
                transform: none !important;
                page-break-after: avoid;
                page-break-inside: avoid;
            }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="print:py-0 py-4 sm:py-8">

    <!-- Top Actions panel (hidden in print) -->
    <div class="no-print mb-4 sm:mb-6 flex flex-wrap justify-center gap-3 sm:gap-4 px-4">
        <a href="{{ url('/') }}" class="px-4 sm:px-5 py-2 sm:py-2.5 rounded-xl border border-gray-300 hover:bg-gray-100 font-bold text-xs sm:text-sm text-gray-700 transition duration-150 flex items-center gap-2 shadow-sm bg-white">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
        <button onclick="window.print()" class="px-5 sm:px-6 py-2 sm:py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-xs sm:text-sm shadow-lg shadow-blue-500/20 transition duration-150 flex items-center gap-2">
            <i class="fa-solid fa-print"></i> Print Certificate
        </button>
    </div>

    @php
        $certInchargeSig = \App\Models\Setting::where('key', 'cert_incharge_signature')->value('value');
        $certSignature = \App\Models\Setting::where('key', 'cert_signature')->value('value');
    @endphp

    <!-- EXACT CERTIFICATE IMAGE WITH OVERLAY DYNAMIC FIELDS -->
    <div class="cert-scale-container">
        <div class="cert-wrapper select-none">

        <!-- 1. Regd No. (Top Left) -->
        <div class="absolute font-extrabold text-slate-900 text-[14px] tracking-tight" style="left: 235px; top: 31px;">
            ({{ $student->certificate->regd_no }})
        </div>

        <!-- 2. Sl No. (Top Right) -->
        <div class="absolute font-extrabold text-slate-900 text-[14px] tracking-tight" style="left: 820px; top: 31px;">
            {{ $student->certificate->sl_no }}
        </div>

        <!-- 3. Student Name -->
        <div class="absolute font-extrabold text-slate-900 text-[18px] tracking-wide text-center" style="left: 420px; top: 408px; width: 450px;">
            {{ strtoupper($student->certificate->name) }}
        </div>

        <!-- 4. Father / Mother Name -->
        <div class="absolute font-extrabold text-slate-900 text-[15px] tracking-wide text-center" style="left: 280px; top: 455px; width: 330px;">
            {{ strtoupper($student->certificate->father_name) }}
        </div>

        <!-- 5. Date of Birth -->
        <div class="absolute font-extrabold text-slate-900 text-[15px] tracking-wide text-center" style="left: 720px; top: 455px; width: 180px;">
            {{ $student->certificate->dob ? \Carbon\Carbon::parse($student->certificate->dob)->format('d.m.Y') : '' }}
        </div>

        <!-- 6. Course -->
        <div class="absolute font-extrabold text-[#15803d] italic text-[18px] text-center" style="left: 340px; top: 498px; width: 560px; font-family: Georgia, serif;">
            {{ $student->certificate->course }}
        </div>

        <!-- 7. From Date -->
        <div class="absolute font-extrabold text-slate-900 text-[14px] tracking-wide text-center" style="left: 310px; top: 592px; width: 150px;">
            {{ $student->certificate->from_date ? \Carbon\Carbon::parse($student->certificate->from_date)->format('d.m.Y') : '' }}
        </div>

        <!-- 8. To Date -->
        <div class="absolute font-extrabold text-slate-900 text-[14px] tracking-wide text-center" style="left: 505px; top: 592px; width: 215px;">
            {{ $student->certificate->to_date ? \Carbon\Carbon::parse($student->certificate->to_date)->format('d.m.Y') : '' }}
        </div>

        <!-- 9. Training Incharge Signature -->
        <div class="absolute flex items-center justify-center" style="left: 160px; top: 670px; width: 140px; height: 40px;">
            @if($certInchargeSig)
                <img src="{{ asset($certInchargeSig) }}" class="max-h-10 object-contain">
            @endif
        </div>

        <!-- 10. Authorised Signatory Signature -->
        <div class="absolute flex items-center justify-center" style="left: 680px; top: 670px; width: 140px; height: 40px;">
            @if($certSignature)
                <img src="{{ asset($certSignature) }}" class="max-h-10 object-contain">
            @endif
        </div>

    </div>
</div>

</body>
</html>
