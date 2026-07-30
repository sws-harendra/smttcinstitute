@extends('layouts.app')

@section('title', 'Student Admission Form | Smart Technical Training Institute')

@section('meta')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<style> 
    .admission-form-wrapper { font-family: 'Plus Jakarta Sans', sans-serif; } 
    .bg-brand-500 { background-color: #fbbc34; }
    .bg-brand-50 { background-color: #fffbeb; }
    .text-brand-900 { color: #78350f; }
    .border-brand-500 { border-color: #fbbc34; }
    .from-brand-400 { --tw-gradient-from: #fbbf24 var(--tw-gradient-from-position); --tw-gradient-to: rgb(251 191 36 / 0) var(--tw-gradient-to-position); --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to); }
    .to-brand-600 { --tw-gradient-to: #d97706 var(--tw-gradient-to-position); }
    .hover\:bg-brand-600:hover { background-color: #d97706; }
    .hover\:bg-brand-100:hover { background-color: #fef3c7; }
    .text-brand-600 { color: #d97706; }
    .accent-brand-600 { accent-color: #d97706; }
    .focus\:border-brand-500:focus { border-color: #fbbc34; }
</style>
<script>
    var STATE_DISTRICTS  = @json($stateDistricts ?? []);
    var DISTRICT_CENTERS = @json($districtCenters ?? []);
</script>
@endsection

@section('content')
<main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 admission-form-wrapper bg-gray-50">
    <div class="w-full max-w-6xl">

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <div class="bg-brand-500 py-5 px-6 sm:px-10 text-center relative overflow-hidden" style="color: black;">
                <div class="absolute inset-0 opacity-20 bg-gradient-to-br from-brand-400 to-brand-600"></div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight relative z-10">Admission Form</h1>
                <p class="text-black/80 text-xs sm:text-sm mt-1 relative z-10 font-medium">Complete your profile to register in our student database</p>
            </div>

            <form action="{{ route('student.register') }}" method="POST" enctype="multipart/form-data" class="p-4 sm:p-8 lg:p-10 space-y-6 sm:space-y-8">
                @csrf

                @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 rounded-xl p-4 text-red-700">
                    <div class="font-bold text-sm mb-1"><i class="fa-solid fa-triangle-exclamation mr-2"></i>Please correct the errors below:</div>
                    <ul class="list-disc list-inside text-xs space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 rounded-xl p-4 text-green-700">
                    <div class="font-bold text-sm mb-1"><i class="fa-solid fa-check mr-2"></i>Success!</div>
                    <p class="text-xs">{{ session('success') }}</p>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

                    {{-- STATE --}}
                    <div>
                        <label for="state" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Select State <span class="text-red-500">*</span>
                        </label>
                        <select name="state" id="state" required
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                            <option value="">--Select State--</option>
                            @foreach ($states as $st)
                                <option value="{{ $st }}" {{ old('state') == $st ? 'selected' : '' }}>
                                    {{ $st }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- DISTRICT --}}
                    <div>
                        <label for="district" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Select District <span class="text-red-500">*</span>
                        </label>
                        <select name="district" id="district" required
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                            <option value="">--Select State First--</option>
                        </select>
                    </div>

                    {{-- CENTER --}}
                    <div>
                        <label for="center" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Center <span class="text-red-500">*</span>
                        </label>
                        <select name="center" id="center" required
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                            <option value="">--Select District First--</option>
                        </select>
                    </div>

                    {{-- NAME --}}
                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}"
                            placeholder="Enter Name"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- GENDER --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Gender <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center gap-6 py-2.5">
                            <label class="inline-flex items-center text-sm cursor-pointer">
                                <input type="radio" name="gender" value="Male" required {{ old('gender') == 'Male' ? 'checked' : '' }} class="w-4 h-4 accent-brand-600">
                                <span class="ml-2 font-medium">Male</span>
                            </label>
                            <label class="inline-flex items-center text-sm cursor-pointer">
                                <input type="radio" name="gender" value="Female" required {{ old('gender') == 'Female' ? 'checked' : '' }} class="w-4 h-4 accent-brand-600">
                                <span class="ml-2 font-medium">Female</span>
                            </label>
                            <label class="inline-flex items-center text-sm cursor-pointer">
                                <input type="radio" name="gender" value="Other" required {{ old('gender') == 'Other' ? 'checked' : '' }} class="w-4 h-4 accent-brand-600">
                                <span class="ml-2 font-medium">Other</span>
                            </label>
                        </div>
                    </div>

                    {{-- ENROLLMENT --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">
                            Enrollment No. <span class="text-gray-400">(Auto Generated)</span>
                        </label>
                        <input type="text" name="enrollment_no" readonly value="{{ $nextEnrollment }}"
                            class="w-full border border-gray-200 bg-gray-100 text-gray-500 rounded-xl px-4 py-3 text-sm cursor-not-allowed font-mono font-semibold outline-none">
                    </div>

                    {{-- FATHER NAME --}}
                    <div>
                        <label for="father_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Father's Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="father_name" id="father_name" required value="{{ old('father_name') }}"
                            placeholder="Enter Father's Name"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- MOTHER NAME --}}
                    <div>
                        <label for="mother_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Mother's Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="mother_name" id="mother_name" required value="{{ old('mother_name') }}"
                            placeholder="Enter Mother's Name"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- DOB --}}
                    <div>
                        <label for="dob" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Date of Birth <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="dob" id="dob" required
                            max="{{ now()->subYears(18)->format('Y-m-d') }}" value="{{ old('dob') }}"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- MOBILE --}}
                    <div>
                        <label for="mobile_no" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Mobile No. <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" name="mobile_no" id="mobile_no" required value="{{ old('mobile_no') }}"
                            placeholder="Enter Mobile No."
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Email Id <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}"
                            placeholder="Enter Email"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- ADDRESS --}}
                    <div>
                        <label for="address" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="address" id="address" required value="{{ old('address') }}"
                            placeholder="Address details"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- USERNAME --}}
                    <div>
                        <label for="username" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Username <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="username" id="username" required value="{{ old('username') }}"
                            placeholder="Create Username"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password" required placeholder="Create Password"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- EXAM PASS --}}
                    <div>
                        <label for="exam_pass" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Exam Pass
                        </label>
                        <input type="text" name="exam_pass" id="exam_pass" value="{{ old('exam_pass') }}"
                            placeholder="Exam Pass"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- PASS YEAR --}}
                    <div>
                        <label for="pass_year" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Year
                        </label>
                        <input type="text" name="pass_year" id="pass_year" value="{{ old('pass_year') }}"
                            placeholder="Year"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- MARKS/GRADE --}}
                    <div>
                        <label for="marks_grade" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Marks(%)/Grade
                        </label>
                        <input type="text" name="marks_grade" id="marks_grade" value="{{ old('marks_grade') }}"
                            placeholder="Marks/Grade"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- BOARD --}}
                    <div>
                        <label for="board" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Board
                        </label>
                        <input type="text" name="board" id="board" value="{{ old('board') }}"
                            placeholder="Board"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                    {{-- COURSE --}}
                    <div>
                        <label for="course" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Select Course <span class="text-red-500">*</span>
                        </label>
                        <select name="course" id="course" required
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                            <option value="">--Select Course name--</option>
                            @foreach ($courses as $crs)
                                <option value="{{ $crs }}" {{ old('course') == $crs ? 'selected' : '' }}>
                                    {{ $crs }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- PHOTO --}}
                    <div>
                        <label for="photo" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Photo <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center gap-4">
                            <input type="file" name="photo" id="photo" required accept="image/*" onchange="previewPhoto(event)"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-900 hover:file:bg-brand-100 cursor-pointer">
                            <div id="image-preview-container" class="hidden">
                                <img id="image-preview" src="#" alt="Preview" class="w-12 h-12 rounded-full object-cover border-2 border-brand-500 shadow-sm">
                            </div>
                        </div>
                    </div>

                    {{-- SESSION START --}}
                    <div>
                        <label for="session_start" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Session Start <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="session_start" id="session_start" required value="{{ old('session_start') }}"
                            class="w-full border-2 border-gray-100 hover:border-gray-200 focus:border-brand-500 rounded-xl px-4 py-3 text-sm focus:outline-none transition-colors bg-gray-50">
                    </div>

                </div>{{-- end grid --}}

                <div class="pt-6 border-t border-gray-100 flex justify-end items-center gap-4">
                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-black font-extrabold px-8 py-3.5 rounded-xl shadow-md hover:shadow-lg transition-all flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-floppy-disk"></i> Submit Admission
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<script>
// Photo preview
function previewPhoto(event) {
    var reader = new FileReader();
    reader.onload = function() {
        document.getElementById('image-preview').src = reader.result;
        document.getElementById('image-preview-container').classList.remove('hidden');
    };
    if (event.target.files && event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
    }
}

// Cascading dropdowns using pre-loaded STATE_DISTRICTS and DISTRICT_CENTERS maps
(function() {
    var stateEl    = document.getElementById('state');
    var districtEl = document.getElementById('district');
    var centerEl   = document.getElementById('center');

    // Rebuild a <select> from a string array
    function buildOptions(sel, arr, placeholder) {
        sel.innerHTML = '';
        var def = document.createElement('option');
        def.value    = '';
        def.disabled = true;
        def.selected = true;
        def.textContent = placeholder;
        sel.appendChild(def);
        for (var i = 0; i < arr.length; i++) {
            var o = document.createElement('option');
            o.value = o.textContent = arr[i];
            sel.appendChild(o);
        }
    }

    // Reset select to placeholder
    function resetTo(sel, msg) {
        sel.innerHTML = '<option value="" disabled selected>' + msg + '</option>';
    }

    // STATE changes -> populate districts
    stateEl.addEventListener('change', function() {
        var districts = STATE_DISTRICTS[this.value];
        if (districts && districts.length > 0) {
            buildOptions(districtEl, districts, '--Select District--');
        } else {
            resetTo(districtEl, '--Select State First--');
        }
        resetTo(centerEl, '--Select District First--');
    });

    // DISTRICT changes -> populate centers
    districtEl.addEventListener('change', function() {
        var centers = DISTRICT_CENTERS[this.value];
        if (centers && centers.length > 0) {
            buildOptions(centerEl, centers, '--Select Center name--');
        } else {
            resetTo(centerEl, 'No centers found');
        }
    });

    // Restore values after validation error redirect
    var oldState    = '{{ old("state") }}';
    var oldDistrict = '{{ old("district") }}';
    var oldCenter   = '{{ old("center") }}';

    if (oldState) {
        stateEl.value = oldState;
        var districts = STATE_DISTRICTS[oldState];
        if (districts && districts.length > 0) {
            buildOptions(districtEl, districts, '--Select District--');
            if (oldDistrict) {
                districtEl.value = oldDistrict;
                var centers = DISTRICT_CENTERS[oldDistrict];
                if (centers && centers.length > 0) {
                    buildOptions(centerEl, centers, '--Select Center name--');
                    if (oldCenter) centerEl.value = oldCenter;
                }
            }
        }
    }
})();
</script>
@endsection
