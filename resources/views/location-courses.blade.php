@extends('layouts.app')

@section('title', 'Courses by Area & Location in ' . $locationName . ' | SMTTC Institute')

@section('meta')
    <meta name="description" content="Find specialized chip-level technical courses available across {{ $locationName }}, Danapur, Bailey Road, and neighboring towns. 100% practical lab training at SMTTC Institute.">
    <link rel="canonical" href="{{ url('/locations/' . $locationSlug) }}">
@endsection

@section('content')

<style>
/* ==========================================================================
   LOCATION COURSES STYLES - 100% MATCHING SCREENSHOT 1
   ========================================================================== */
.location-courses-wrapper {
  padding-top: 55px;
  padding-bottom: 90px;
  min-height: 85vh;
  position: relative;
  z-index: 1;
  background: radial-gradient(circle at 50% -10%, rgba(224, 231, 255, 0.45) 0%, rgba(243, 232, 255, 0.25) 35%, rgba(255, 255, 255, 0) 70%);
}

.location-courses-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

/* Breadcrumbs */
.location-breadcrumbs-wrap {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.location-breadcrumbs {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 16px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 9999px;
  font-size: 12.5px;
  font-weight: 700;
  color: #64748b;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
}

.location-breadcrumbs a {
  color: #64748b;
  text-decoration: none;
  transition: color 0.2s ease;
}

.location-breadcrumbs a:hover {
  color: #2563eb;
}

.location-breadcrumbs-sep {
  color: #cbd5e1;
}

.location-breadcrumbs-current {
  color: #0f172a;
}

/* Hero Header (Screenshot 1 Exact) */
.location-courses-header {
  text-align: center;
  max-width: 780px;
  margin: 0 auto 46px auto;
}

.location-directory-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 16px;
  background: rgba(99, 102, 241, 0.09);
  border: 1px solid rgba(99, 102, 241, 0.28);
  border-radius: 9999px;
  color: #4f46e5;
  font-size: 11.5px;
  font-weight: 800;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  margin-bottom: 16px;
}

.location-courses-title {
  font-size: 42px;
  font-weight: 900;
  color: #0f172a;
  line-height: 1.18;
  letter-spacing: -1px;
  margin-bottom: 14px;
}

.location-courses-subtitle {
  font-size: 15px;
  color: #64748b;
  line-height: 1.68;
  max-width: 680px;
  margin: 0 auto 26px auto;
}

/* Search Box (Screenshot 1 Exact) */
.courses-search-wrap {
  position: relative;
  max-width: 520px;
  margin: 0 auto;
}

.courses-search-wrap i {
  position: absolute;
  left: 18px;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  pointer-events: none;
  font-size: 15px;
}

.courses-search-input {
  width: 100%;
  padding: 13px 20px 13px 48px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 9999px;
  font-size: 14px;
  color: #0f172a;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
  outline: none;
  transition: all 0.25s ease;
}

.courses-search-input:focus {
  border-color: #3b82f6;
  box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12), 0 4px 14px rgba(0, 0, 0, 0.05);
}

.courses-search-input::placeholder {
  color: #94a3b8;
}

/* Courses Grid */
.courses-grid-layout {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}

@media (max-width: 1024px) {
  .courses-grid-layout {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .courses-grid-layout {
    grid-template-columns: 1fr;
    gap: 18px;
  }
  .location-courses-title {
    font-size: 32px;
  }
}

/* ==========================================================================
   COURSE CARD (SCREENSHOT 1 EXACT)
   ========================================================================== */
.regional-course-card {
  position: relative;
  background: #ffffff;
  border: 1px solid rgba(226, 232, 240, 0.9);
  border-radius: 22px;
  padding: 26px 24px 20px 24px;
  box-shadow: 0 4px 18px -2px rgba(15, 23, 42, 0.04);
  transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
              box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1),
              border-color 0.35s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 270px;
}

.regional-course-card:hover {
  transform: translateY(-7px);
  border-color: #3b82f6;
  box-shadow: 0 18px 36px -8px rgba(59, 130, 246, 0.16),
              0 4px 12px rgba(0, 0, 0, 0.03);
}

/* Card Badges Row */
.course-card-badges {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.course-loc-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 5px 12px;
  border-radius: 9999px;
  background: #fef9c3;
  color: #854d0e;
  font-size: 12px;
  font-weight: 700;
}

.course-loc-pill i {
  color: #eab308;
  font-size: 11px;
}

.course-iso-pill {
  display: inline-flex;
  align-items: center;
  padding: 4px 10px;
  border-radius: 8px;
  background: #ecfdf5;
  color: #059669;
  font-size: 11.5px;
  font-weight: 700;
  letter-spacing: 0.02em;
}

/* Card Title */
.course-card-title {
  font-size: 18.5px;
  font-weight: 800;
  color: #0f172a;
  line-height: 1.35;
  margin: 0 0 10px 0;
  letter-spacing: -0.3px;
}

.course-card-title a {
  color: #0f172a;
  text-decoration: none;
  transition: color 0.2s ease;
}

.course-card-title a:hover {
  color: #2563eb;
}

/* Card Excerpt */
.course-card-desc {
  font-size: 13.5px;
  color: #64748b;
  line-height: 1.62;
  margin-bottom: 20px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Card Footer */
.course-card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 14px;
  border-top: 1px solid #f1f5f9;
  margin-top: auto;
}

.course-card-category {
  color: #2563eb;
  font-weight: 700;
  font-size: 13px;
  text-decoration: none;
  transition: color 0.2s ease;
}

.course-card-category:hover {
  color: #1d4ed8;
  text-decoration: underline;
}

.course-card-cta {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  color: #0f172a;
  font-weight: 800;
  font-size: 13px;
  text-decoration: none;
  transition: all 0.2s ease;
}

.course-card-cta i {
  transition: transform 0.2s ease;
}

.regional-course-card:hover .course-card-cta {
  color: #2563eb;
}

.regional-course-card:hover .course-card-cta i {
  transform: translateX(4px);
}

/* Quick Location Pills Filter */
.location-pills-bar {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  flex-wrap: wrap;
  margin-top: 20px;
  margin-bottom: 10px;
}

.location-pill-btn {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 6px 14px;
  border-radius: 9999px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  color: #64748b;
  font-size: 12.5px;
  font-weight: 700;
  text-decoration: none;
  transition: all 0.2s ease;
}

.location-pill-btn:hover,
.location-pill-btn.active {
  background: #2563eb;
  border-color: #2563eb;
  color: #ffffff;
  box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
}

/* Bottom CTA Banner */
.courses-cta-banner {
  margin-top: 60px;
  background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
  border-radius: 24px;
  padding: 38px 36px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #ffffff;
  box-shadow: 0 10px 30px rgba(15, 23, 42, 0.15);
  flex-wrap: wrap;
  gap: 24px;
}

.courses-cta-banner h3 {
  font-size: 22px;
  font-weight: 800;
  margin-bottom: 6px;
  color: #ffffff;
}

.courses-cta-banner p {
  font-size: 14px;
  color: #94a3b8;
  margin: 0;
}

.courses-cta-btns {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.btn-cta-phone {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  border-radius: 12px;
  background: #2563eb;
  color: #ffffff;
  font-size: 13.5px;
  font-weight: 800;
  text-decoration: none;
  transition: background 0.2s ease;
}

.btn-cta-phone:hover {
  background: #1d4ed8;
}

.btn-cta-locations {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 22px;
  border-radius: 12px;
  background: rgba(255, 255, 255, 0.1);
  color: #ffffff;
  font-size: 13.5px;
  font-weight: 700;
  text-decoration: none;
  border: 1px solid rgba(255, 255, 255, 0.2);
  transition: background 0.2s ease;
}

.btn-cta-locations:hover {
  background: rgba(255, 255, 255, 0.18);
}
</style>

<div class="location-courses-wrapper">
    <div class="location-courses-container">

        <!-- Breadcrumbs -->
        <div class="location-breadcrumbs-wrap">
            <nav class="location-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <span class="location-breadcrumbs-sep">/</span>
                <a href="{{ route('locations.index') }}">Locations</a>
                <span class="location-breadcrumbs-sep">/</span>
                <span class="location-breadcrumbs-current">{{ $locationName }}</span>
            </nav>
        </div>

        <!-- Hero Header (Matching Screenshot 1) -->
        <div class="location-courses-header">
            <!-- Badge -->
            <div class="location-directory-badge">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Regional Training Directory</span>
            </div>

            <!-- Title -->
            <h1 class="location-courses-title">Courses by Area & Location in {{ $locationName }}</h1>

            <!-- Subtitle -->
            <p class="location-courses-subtitle">
                @if(in_array(strtolower($locationSlug), ['all', 'bihar', 'all-locations']))
                    Find specialized chip-level technical courses available across Patna, Danapur, Bailey Road, and neighboring towns.
                @else
                    Find specialized chip-level technical courses available across {{ $locationName }} and neighboring towns.
                @endif
            </p>

            <!-- Search box (Screenshot 1) -->
            <div class="courses-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="text"
                    id="courseSearchInput"
                    onkeyup="filterCourses()"
                    placeholder="Search your town, area, or course..."
                    class="courses-search-input"
                >
            </div>

            <!-- Optional quick location pills -->
            @if(isset($allPublished) && $allPublished->count() > 0)
                @php
                    $distinctLocs = $allPublished->pluck('location_name')->unique()->values();
                @endphp
                @if($distinctLocs->count() > 1)
                <div class="location-pills-bar">
                    <a href="{{ route('locations.allCourses') }}" class="location-pill-btn {{ in_array(strtolower($locationSlug), ['bihar', 'all']) ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group"></i> All Bihar
                    </a>
                    @foreach($distinctLocs as $dLoc)
                    <a href="{{ route('locations.courses', Str::slug($dLoc)) }}" class="location-pill-btn {{ strtolower(Str::slug($dLoc)) === strtolower($locationSlug) ? 'active' : '' }}">
                        <i class="fa-solid fa-location-dot"></i> {{ $dLoc }}
                    </a>
                    @endforeach
                </div>
                @endif
            @endif
        </div>

        @if(isset($courses) && $courses->count() > 0)
            <!-- Courses Grid (Matching Screenshot 1) -->
            <div class="courses-grid-layout" id="coursesGridContainer">
                @foreach($courses as $course)
                <div class="regional-course-card"
                     data-search="{{ strtolower($course->service_name . ' ' . $course->location_name . ' ' . ($course->h1_heading ?? '') . ' ' . ($course->hero_description ?? '')) }}">
                    <div>
                        <!-- Badges Row: 📍 Location & ISO Certified -->
                        <div class="course-card-badges">
                            <div class="course-loc-pill">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $course->location_name }}</span>
                            </div>

                            <div class="course-iso-pill">
                                <span>ISO Certified</span>
                            </div>
                        </div>

                        <!-- Card Title -->
                        <h2 class="course-card-title">
                            <a href="{{ url($course->slug) }}">
                                {{ $course->h1_heading ?: ("Best " . $course->service_name . " in " . $course->location_name . " | 100% Practical Training") }}
                            </a>
                        </h2>

                        <!-- Card Excerpt / Description -->
                        <p class="course-card-desc">
                            {{ Str::limit($course->hero_description ?: ("Looking to master " . $course->service_name . " in " . $course->location_name . "? SMTTC Institute provides ISO-certified technical training with 100% live hands-on practice, circuit..."), 135) }}
                        </p>
                    </div>

                    <!-- Card Footer: Course Name & View Details -->
                    <div class="course-card-footer">
                        <a href="{{ url($course->slug) }}" class="course-card-category">
                            {{ $course->service_name }}
                        </a>

                        <a href="{{ url($course->slug) }}" class="course-card-cta">
                            <span>View Details</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Empty Search State -->
            <div id="noCourseMatchBox" style="display: none; text-align: center; padding: 48px 24px; background: #ffffff; border-radius: 18px; border: 1px solid #e2e8f0; max-width: 480px; margin: 32px auto 0 auto;">
                <i class="fa-solid fa-magnifying-glass text-3xl text-slate-400 mb-3 block"></i>
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">
                    No Courses Matching Your Search
                </h3>
                <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 16px;">
                    Can't find your specific locality or course module? Contact our counseling office for immediate guidance.
                </p>
                <a href="tel:7870516006" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 10px; background: #0f172a; color: #ffffff; font-size: 13px; font-weight: 700; text-decoration: none;">
                    <i class="fa-solid fa-phone"></i> Call Helpline
                </a>
            </div>
        @else
            <!-- Empty State -->
            <div style="text-align: center; padding: 52px 24px; background: #ffffff; border-radius: 20px; border: 1px solid #e2e8f0; max-width: 520px; margin: 32px auto 0 auto;">
                <div style="width: 56px; height: 56px; border-radius: 16px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 16px auto;">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 style="font-size: 19px; font-weight: 800; color: #0f172a; margin-bottom: 8px;">
                    No Courses Published Yet in {{ $locationName }}
                </h3>
                <p style="font-size: 13.5px; color: #64748b; line-height: 1.65; margin-bottom: 22px;">
                    We are actively expanding our training directory to {{ $locationName }}. In the meantime, explore all available regional courses or contact our admissions desk.
                </p>
                <div style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('locations.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 10px; background: #2563eb; color: #ffffff; font-size: 13px; font-weight: 700; text-decoration: none;">
                        <i class="fa-solid fa-map-location-dot"></i> View All Locations
                    </a>
                    <a href="tel:7870516006" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 10px; background: #f1f5f9; color: #0f172a; font-size: 13px; font-weight: 700; text-decoration: none;">
                        <i class="fa-solid fa-phone"></i> +91-7870516006
                    </a>
                </div>
            </div>
        @endif

        <!-- Bottom Assistance Banner -->
        <div class="courses-cta-banner">
            <div>
                <h3>Need Admission Guidance or Hostel Facility in {{ $locationName }}?</h3>
                <p>Speak directly with our senior course counselor and schedule a live lab demonstration.</p>
            </div>
            <div class="courses-cta-btns">
                <a href="tel:7870516006" class="btn-cta-phone">
                    <i class="fa-solid fa-phone"></i> +91-7870516006
                </a>
                <a href="{{ route('locations.index') }}" class="btn-cta-locations">
                    <i class="fa-solid fa-location-dot"></i> Other Locations
                </a>
            </div>
        </div>

    </div>
</div>

<script>
function filterCourses() {
    const query = (document.getElementById('courseSearchInput').value || '').toLowerCase().trim();
    const cards = document.querySelectorAll('.regional-course-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const text = card.getAttribute('data-search') || '';
        if (!query || text.includes(query)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const noMatchBox = document.getElementById('noCourseMatchBox');
    if (noMatchBox) {
        noMatchBox.style.display = (visibleCount === 0 && query !== '') ? 'block' : 'none';
    }
}
</script>

@endsection
