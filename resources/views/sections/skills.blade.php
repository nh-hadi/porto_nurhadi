@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp
<!-- ========================================== -->
<!-- SKILLS & SERVICES HORIZONTAL SLIDER SECTION -->
<!-- ========================================== -->
<section id="skills" class="mt-16 w-full text-left">
    <!-- Section Header & Slider Controls -->
    <div class="flex items-end justify-between mb-4 px-1">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full {{ $temaAktif['ping'] }} animate-ping"></span>
                <span class="font-racing font-bold text-xs uppercase tracking-widest bg-gradient-to-r {{ $temaAktif['text_gradient'] }} bg-clip-text text-transparent">
                    KOMPETENSI UTAMA
                </span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                Keahlian & Kemampuan Teknis
            </h2>
        </div>

        <!-- Navigation Slider Arrows -->
        <div class="flex items-center gap-1.5">
            <button onclick="scrollSkills('left')" class="w-8 h-8 rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all flex items-center justify-center shadow-xs active:scale-90 cursor-pointer" aria-label="Slide Kiri">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            <button onclick="scrollSkills('right')" class="w-8 h-8 rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all flex items-center justify-center shadow-xs active:scale-90 cursor-pointer" aria-label="Slide Kanan">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
        </div>
    </div>

    <!-- Swipeable / Scrollable Horizontal Container (Full Bleed on Mobile) -->
    <div id="skills-slider" class="-mx-4 px-4 sm:mx-0 sm:px-0 flex gap-3.5 sm:gap-4 overflow-x-auto pb-4 pt-1 snap-x snap-mandatory scroll-smooth no-scrollbar select-none cursor-grab active:cursor-grabbing" style="scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch; scroll-padding-left: 1rem;">
        
        @forelse($daftarKeahlian as $skill)
            @php
                $themeColor = $skill->warna_tema ?? 'amber';
                $gradientClass = match($themeColor) {
                    'purple' => 'from-purple-500 to-rose-500',
                    'cyan' => 'from-cyan-400 to-rose-500',
                    'rose' => 'from-rose-500 to-amber-500',
                    'emerald' => 'from-emerald-400 to-teal-600',
                    default => 'from-amber-400 to-rose-500',
                };
                $iconBg = match($themeColor) {
                    'purple' => 'from-purple-500/10 to-rose-500/10 border-purple-200 text-purple-600',
                    'cyan' => 'from-cyan-500/10 to-rose-500/10 border-cyan-200 text-cyan-600',
                    'rose' => 'from-rose-500/10 to-amber-500/10 border-rose-200 text-rose-600',
                    'emerald' => 'from-emerald-500/10 to-teal-500/10 border-emerald-200 text-emerald-600',
                    default => 'from-amber-500/10 to-rose-500/10 border-amber-200 text-amber-600',
                };
                $badgeClass = match($themeColor) {
                    'purple' => 'bg-purple-50 text-purple-700 border-purple-200',
                    'cyan' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                    'rose' => 'bg-rose-50 text-rose-700 border-rose-200',
                    'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    default => 'bg-amber-50 text-amber-700 border-amber-200',
                };
                $titleHoverClass = match($themeColor) {
                    'purple' => 'group-hover:text-purple-600',
                    'cyan' => 'group-hover:text-cyan-600',
                    'rose' => 'group-hover:text-rose-600',
                    'emerald' => 'group-hover:text-emerald-600',
                    default => 'group-hover:text-amber-600',
                };
            @endphp
            <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r {{ $gradientClass }} transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                <div>
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $iconBg }} border flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="{{ $skill->ikon }} text-lg"></i>
                        </div>
                        <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full border {{ $badgeClass }}">
                            {{ $skill->lencana }}
                        </span>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm mb-1.5 {{ $titleHoverClass }} transition-colors">{{ $skill->judul }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">
                        {{ $skill->deskripsi }}
                    </p>
                </div>
                <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                    @if(!empty($skill->label_teknologi))
                        @foreach($skill->label_teknologi as $tIdx => $tag)
                            <span class="px-2 py-0.5 rounded {{ $tIdx === 0 ? 'bg-rose-100 text-rose-800' : ($tIdx === 1 ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-700') }} font-bold">
                                {{ $tag }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>
        @empty
            <div class="w-full py-8 text-center text-slate-400 text-xs">Belum ada keahlian yang terdaftar.</div>
        @endforelse

    </div>

    <!-- Slide Indicator Hint & Pagination Dots -->
    <div class="flex items-center justify-between text-[11px] text-slate-400 font-medium px-1 mt-2">
        <span class="flex items-center gap-1.5 text-slate-500 text-[11px]">
            <i class="fa-solid fa-hand-pointer text-[10px] {{ $temaAktif['icon'] }} animate-bounce"></i>
            <span>Geser kartu untuk melihat lainnya</span>
        </span>
        
        <!-- Interactive Dots for Mobile & Desktop -->
        <div class="flex items-center gap-1.5" id="slider-dots">
            @foreach($daftarKeahlian as $dIdx => $dItem)
                <button onclick="goToSlide({{ $dIdx }})" class="dot {{ $dIdx === 0 ? 'w-4 h-1.5 rounded-full ' . $temaAktif['ping'] : 'w-1.5 h-1.5 rounded-full bg-slate-300' }} transition-all duration-300" aria-label="Slide {{ $dIdx + 1 }}"></button>
            @endforeach
        </div>
    </div>
</section>
