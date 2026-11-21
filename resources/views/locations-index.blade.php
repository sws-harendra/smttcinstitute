@extends('layouts.app')

@section('title', 'Locations We Serve | SMTTC Technical Training Institute')

@section('meta')
    <meta name="description" content="Explore all cities and localities served by SMTTC Institute across Bihar including Patna, Danapur, Kankarbagh, Boring Road, and more. 100% practical chip-level lab training.">
    <link rel="canonical" href="{{ url('/locations') }}">
@endsection

@section('content')

<style>
/* ==========================================================================
   LOCATIONS STYLES - 100% MATCHING REPAIR SAATHI (SCREENSHOT 2)
   ========================================================================== */
.locations-page-wrapper {
  padding-top: 60px;
  padding-bottom: 90px;
  min-height: 85vh;
  position: relative;
  z-index: 1;
  background: radial-gradient(circle at 50% -10%, rgba(224, 231, 255, 0.45) 0%, rgba(243, 232, 255, 0.25) 35%, rgba(255, 255, 255, 0) 70%);
}

.locations-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.locations-hero-header {
  text-align: center;
  max-width: 760px;
  margin: 0 auto 46px auto;
}

.locations-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 16px;
  background: rgba(59, 130, 246, 0.09);
  border: 1px solid rgba(59, 130, 246, 0.28);
  border-radius: 9999px;
  color: #2563eb;
  font-size: 12.5px;
  font-weight: 800;
  letter-spacing: 0.03em;
  margin-bottom: 16px;
}

.locations-hero-title {
  font-size: 42px;
  font-weight: 900;
  color: #0f172a;
  line-height: 1.18;
  letter-spacing: -1px;
  margin-bottom: 14px;
}

.locations-hero-desc {
  font-size: 15px;
  color: #64748b;
  line-height: 1.68;
  max-width: 680px;
  margin: 0 auto 26px auto;
}

/* SEARCH BOX */
.locations-search-wrap {
  position: relative;
  max-width: 440px;
  margin: 0 auto;
}

.locations-search-wrap i {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: #94a3b8;
  pointer-events: none;
  font-size: 15px;
}

.locations-search-input {
  width: 100%;
  padding: 13px 18px 13px 44px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 16px;
  font-size: 14px;
  color: #0f172a;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
  outline: none;
  transition: all 0.25s ease;
}

.locations-search-input:focus {
  border-color: #3b82f6;
  box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.12), 0 4px 12px rgba(0, 0, 0, 0.05);
}

/* GRID */
.locations-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 26px;
}

@media (max-width: 1024px) {
  .locations-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .locations-grid {
    grid-template-columns: 1fr;
    gap: 18px;
  }
  .locations-hero-title {
    font-size: 32px;
  }
}

/* LOCATION CARD */
.location-card {
  position: relative;
  background: #ffffff;
  border: 1px solid rgba(226, 232, 240, 0.85);
  border-radius: 22px;
  padding: 28px 26px 22px 26px;
  box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
  transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1),
              box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1),
              border-color 0.35s ease;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
  min-height: 270px;
}

.location-card::before {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: var(--card-accent, #3b82f6);
  opacity: 0.65;
  transition: opacity 0.3s ease, height 0.3s ease;
}

.location-card::after {
  content: "";
  position: absolute;
  top: -1px; right: -1px;
  width: 48px; height: 48px;
  border-top: 2.5px solid var(--card-accent, #3b82f6);
  border-right: 2.5px solid var(--card-accent, #3b82f6);
  border-top-right-radius: 22px;
  opacity: 0.35;
  pointer-events: none;
  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}

.location-card:hover {
  transform: translateY(-8px);
  border-color: var(--card-accent, #3b82f6);
  box-shadow: 0 20px 38px -10px var(--card-glow, rgba(59, 130, 246, 0.2)),
              0 6px 16px rgba(0, 0, 0, 0.03);
}

.location-card:hover::before {
  height: 3.5px;
  opacity: 1;
}

.location-card:hover::after {
  width: 64px;
  height: 64px;
  opacity: 1;
}

/* THEME COLORS */
.theme-blue {
  --card-accent: #3b82f6;
  --card-glow: rgba(59, 130, 246, 0.2);
  --icon-bg: #eff6ff;
  --icon-border: #dbeafe;
  --icon-color: #2563eb;
}
.theme-emerald {
  --card-accent: #10b981;
  --card-glow: rgba(16, 185, 129, 0.2);
  --icon-bg: #ecfdf5;
  --icon-border: #d1fae5;
  --icon-color: #059669;
}
.theme-purple {
  --card-accent: #8b5cf6;
  --card-glow: rgba(139, 92, 246, 0.2);
  --icon-bg: #faf5ff;
  --icon-border: #f3e8ff;
  --icon-color: #7c3aed;
}
.theme-pink {
  --card-accent: #ec4899;
  --card-glow: rgba(236, 72, 153, 0.2);
  --icon-bg: #fdf2f8;
  --icon-border: #fce7f3;
  --icon-color: #db2777;
}
.theme-amber {
  --card-accent: #f59e0b;
  --card-glow: rgba(245, 158, 11, 0.2);
  --icon-bg: #fffbeb;
  --icon-border: #fef3c7;
  --icon-color: #d97706;
}
.theme-cyan {
  --card-accent: #06b6d4;
  --card-glow: rgba(6, 182, 212, 0.2);
  --icon-bg: #ecfeff;
  --icon-border: #cffafe;
  --icon-color: #0891b2;
}
.theme-indigo {
  --card-accent: #6366f1;
  --card-glow: rgba(99, 102, 241, 0.2);
  --icon-bg: #eef2ff;
  --icon-border: #e0e7ff;
  --icon-color: #4f46e5;
}

/* CARD INNER ELEMENTS */
.location-card-icon {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  background: var(--icon-bg, #eff6ff);
  border: 1px solid var(--icon-border, #dbeafe);
  color: var(--icon-color, #2563eb);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 19px;
  margin-bottom: 18px;
}

.location-card-title {
  font-size: 20px;
  font-weight: 800;
  color: #0f172a;
  letter-spacing: -0.4px;
  margin-bottom: 4px;
  text-transform: capitalize;
}

.location-card-state {
  font-size: 12.5px;
  font-weight: 600;
  color: #64748b;
  margin-bottom: 12px;
}

.location-card-desc {
  font-size: 13px;
  color: #64748b;
  line-height: 1.55;
  margin-bottom: 14px;
}

.location-card-highlight {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 700;
  color: #334155;
  margin-top: 4px;
}

.location-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 16px;
  border-top: 1px solid #f1f5f9;
  margin-top: 16px;
}

.location-card-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13.5px;
  font-weight: 800;
  color: var(--icon-color, #2563eb);
  text-decoration: none;
  transition: gap 0.2s ease;
}

.location-card:hover .location-card-link {
  gap: 10px;
}
</style>

<div class="locations-page-wrapper">
    <div class="locations-container">

        <!-- Hero Header (Matching Screenshot 2) -->
        <div class="locations-hero-header">
            <div class="locations-hero-badge">
                <i class="fa-solid fa-location-dot"></i>
                <span>Training Coverage Network</span>
            </div>

            <h1 class="locations-hero-title">Locations We Serve</h1>

            <p class="locations-hero-desc">
                We deliver certified technical training and practical lab solutions to students across Patna, Bihar, and expanding regions.
            </p>

            <!-- Search box -->
            <div class="locations-search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="text"
                    id="locSearchInput"
                    onkeyup="filterLocations()"
                    placeholder="Search your locality or city..."
                    class="locations-search-input"
                >
            </div>
        </div>

        @if(isset($locations) && count($locations) > 0)
            <!-- Locations Grid (Matching Screenshot 2) -->
            <div class="locations-grid" id="locationsGridContainer">
                @foreach($locations as $loc)
                <div class="location-card {{ $loc['theme'] }}" data-name="{{ strtolower($loc['name'] . ' ' . $loc['state']) }}">
                    <div>
                        <!-- Location Icon Badge -->
                        <div class="location-card-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <!-- Location Title -->
                        <h2 class="location-card-title">{{ $loc['name'] }}</h2>

                        <!-- Region / State -->
                        <p class="location-card-state">{{ $loc['state'] }}</p>

                        <!-- Description -->
                        <p class="location-card-desc">{{ $loc['description'] }}</p>

                        <!-- Services/Course Count -->
                        <div class="location-card-highlight">
                            <i class="fa-solid fa-shield-halved text-emerald-500"></i>
                            <span>{{ $loc['serviceCount'] }} {{ Str::plural('Course', $loc['serviceCount']) }} Available</span>
                        </div>
                    </div>

                    <!-- Footer Link -->
                    <div class="location-card-footer">
                        <a href="{{ route('locations.courses', $loc['slug']) }}" class="location-card-link">
                            <span>View Courses</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Empty Search State -->
            <div id="noSearchMatchBox" style="display: none; text-align: center; padding: 48px 24px; background: #ffffff; border-radius: 18px; border: 1px solid #e2e8f0; max-width: 460px; margin: 32px auto 0 auto;">
                <i class="fa-solid fa-location-dot text-3xl text-slate-400 mb-3 block"></i>
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">
                    No Locations Found
                </h3>
                <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 16px;">
                    We are expanding across all districts of Bihar. Contact our helpline to request batches in your area.
                </p>
                <a href="tel:7870516006" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 10px; background: #0f172a; color: #ffffff; font-size: 13px; font-weight: 700; text-decoration: none;">
                    <i class="fa-solid fa-phone"></i> Call Helpline
                </a>
            </div>
        @else
            <!-- Empty Database Fallback -->
            <div style="text-align: center; padding: 48px 24px; background: #ffffff; border-radius: 18px; border: 1px solid #e2e8f0; max-width: 480px; margin: 32px auto 0 auto;">
                <div style="width: 56px; height: 56px; border-radius: 16px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 16px auto;">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">
                    Locations Directory Initializing
                </h3>
                <p style="font-size: 13.5px; color: #64748b; line-height: 1.6; margin-bottom: 20px;">
                    Publish location blogs from the admin panel to show them dynamically here!
                </p>
                <a href="{{ route('home') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border-radius: 10px; background: #2563eb; color: #ffffff; font-size: 13px; font-weight: 700; text-decoration: none;">
                    Back to Homepage
                </a>
            </div>
        @endif

    </div>
</div>

<script>
function filterLocations() {
    const query = (document.getElementById('locSearchInput').value || '').toLowerCase().trim();
    const cards = document.querySelectorAll('.location-card');
    let visibleCount = 0;

    cards.forEach(card => {
        const text = card.getAttribute('data-name') || '';
        if (!query || text.includes(query)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    const noMatchBox = document.getElementById('noSearchMatchBox');
    if (noMatchBox) {
        noMatchBox.style.display = (visibleCount === 0 && query !== '') ? 'block' : 'none';
    }
}
</script>

@endsection
