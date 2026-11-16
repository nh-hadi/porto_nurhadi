@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp
<!-- ========================================== -->
<!-- DAFTAR PROJEK & PORTOFOLIO SECTION (#projects) -->
<!-- ========================================== -->
<section id="projects" class="mt-10 sm:mt-12 w-full text-left">
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-4 px-1 gap-3">
        <div>
            <div class="flex items-center gap-2 mb-0.5">
                <span class="w-1.5 h-1.5 rounded-full {{ $temaAktif['ping'] }} animate-ping"></span>
                <span class="font-racing font-bold text-[11px] uppercase tracking-widest bg-gradient-to-r {{ $temaAktif['text_gradient'] }} bg-clip-text text-transparent">
                    PORTOFOLIO & KARYA
                </span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                Daftar Projek & Desain Hardware
            </h2>
            <p class="text-xs text-slate-500 mt-0.5 font-medium">
                Koleksi hasil perancangan skematik & layout PCB, sistem IoT, dan integrasi software.
            </p>

            <!-- Filter Badges / Quick Jump -->
            <div class="flex flex-wrap gap-1.5 text-xs font-semibold mt-2">
                <button type="button" onclick="goToProjectSlide(0)" class="px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs cursor-pointer text-[11px] transition-colors">Semua Projek</button>
                @foreach($daftarProjek as $pIdx => $pItem)
                    <button type="button" onclick="goToProjectSlide({{ $pIdx }})" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 transition-colors cursor-pointer text-[11px]">{{ $pItem->kategori }}</button>
                @endforeach
            </div>
        </div>

        <!-- Slider Controls: Counter & Navigation Buttons -->
        <div class="flex items-center gap-2 self-start md:self-auto">
            <!-- Project Count Badge -->
            <span class="text-[11px] font-bold text-slate-600 bg-slate-100 px-2.5 py-1.5 rounded-lg border border-slate-200/80 flex items-center gap-1.5 shadow-xs">
                <i class="fa-solid fa-layer-group text-slate-400 text-[10px]"></i>
                <span>Projek</span>
                <span id="project-current-num" class="text-slate-900 font-extrabold text-xs">1</span>
                <span class="text-slate-400 font-normal">/</span>
                <span id="project-total-num" class="text-slate-600 font-bold">{{ $daftarProjek->count() }}</span>
            </span>

            <!-- Previous Project Button -->
            <button type="button" onclick="scrollProjectSlide('left')" class="w-8 h-8 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer group" title="Projek Sebelumnya">
                <i class="fa-solid fa-arrow-left text-[11px] group-hover:-translate-x-0.5 transition-transform"></i>
            </button>

            <!-- Next Project Button -->
            <button type="button" onclick="scrollProjectSlide('right')" class="w-8 h-8 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer group" title="Projek Selanjutnya">
                <i class="fa-solid fa-arrow-right text-[11px] group-hover:translate-x-0.5 transition-transform"></i>
            </button>
        </div>
    </div>

    <!-- Project Slider Wrapper -->
    <div class="relative w-full">
        <!-- Slider Track (Horizontal, Full Width, Snap) -->
        <div id="project-slider" class="flex overflow-x-auto gap-4 pb-1 scroll-smooth snap-x snap-mandatory no-scrollbar w-full cursor-grab active:cursor-grabbing select-none" style="-webkit-overflow-scrolling: touch;">
            
            @forelse($daftarProjek as $index => $projek)
                <div class="project-card w-full flex-shrink-0 snap-start bg-white rounded-xl border border-slate-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                        
                        <!-- Left: Media Showcase -->
                        <div class="lg:col-span-6 bg-slate-950 p-3.5 sm:p-4 flex flex-col justify-between relative overflow-hidden">
                            <!-- Ambient Lighting -->
                            <div class="absolute -top-12 -left-12 w-48 h-48 bg-cyan-600/20 rounded-full blur-3xl pointer-events-none"></div>
                            <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-rose-600/20 rounded-full blur-3xl pointer-events-none"></div>

                            <!-- Top Bar inside Media Box with Mode Switcher -->
                            <div class="relative z-10 flex flex-wrap items-center justify-between mb-2 gap-2">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                    <span class="font-racing text-[10px] font-bold text-slate-200 uppercase tracking-wider">{{ $projek->judul }}</span>
                                </div>

                                @if($projek->gambar_desain && $projek->gambar_aplikasi)
                                    <div class="flex items-center bg-slate-900 border border-slate-800 p-0.5 rounded-lg text-[9px] sm:text-[10px] font-bold">
                                        <button type="button" onclick="gantiMediaProjek({{ $index }}, 'desain', '{{ asset($projek->gambar_desain) }}')" id="tab-prj-{{ $index }}-desain" class="px-2 py-1 rounded-md bg-gradient-to-r from-purple-600 to-rose-600 text-white transition-all flex items-center gap-1">
                                            <i class="fa-solid fa-microchip text-[9px]"></i>
                                            <span>Desain Layout</span>
                                        </button>
                                        <button type="button" onclick="gantiMediaProjek({{ $index }}, 'app', '{{ asset($projek->gambar_aplikasi) }}')" id="tab-prj-{{ $index }}-app" class="px-2 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1">
                                            <i class="fa-solid fa-desktop text-[9px]"></i>
                                            <span>Tampilan App</span>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <!-- Main Image Preview with Interactive Lightbox Trigger -->
                            <div class="relative z-10 my-auto rounded-lg overflow-hidden border border-slate-800 bg-slate-900 shadow-xl group/img cursor-pointer" onclick="bukaModalProjek({{ $index }})">
                                <img id="prj-img-{{ $index }}" src="{{ asset($projek->gambar_desain ?? $projek->gambar_aplikasi ?? 'img/logo.png') }}" alt="{{ $projek->judul }}" class="w-full h-auto max-h-[210px] sm:max-h-[230px] object-contain transform group-hover/img:scale-102 transition-transform duration-500" decoding="async">
                                
                                <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-1.5 text-white text-[11px] font-bold backdrop-blur-[2px]">
                                    <i class="fa-solid fa-expand text-xs"></i>
                                    <span>Klik untuk Perbesar Gambar Penuh</span>
                                </div>
                            </div>

                            <!-- Bottom Metadata on Image Box -->
                            <div class="relative z-10 mt-2 flex items-center justify-between text-[10px] text-slate-400 border-t border-slate-800/80 pt-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-300 font-bold">IDS STORE TECHNOLOGY</span>
                                    <span>•</span>
                                    <span class="text-amber-400 font-racing">PORTFOLIO</span>
                                </div>
                                <span class="text-slate-400 font-mono text-[9px]">{{ $projek->subjudul_lencana ?? 'PROJEK UNGGULAN' }}</span>
                            </div>
                        </div>

                        <!-- Right: Comprehensive Details & 4-Panel Highlights -->
                        <div class="lg:col-span-6 p-3.5 sm:p-4 flex flex-col justify-between bg-white">
                            <div>
                                <!-- Header Badges -->
                                <div class="flex flex-wrap items-center gap-1.5 mb-1.5">
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[9px] font-racing font-bold">
                                        {{ $projek->lencana_kategori }}
                                    </span>
                                    @if($projek->subjudul_lencana)
                                        <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200 text-[9px] font-bold">
                                            {{ $projek->subjudul_lencana }}
                                        </span>
                                    @endif
                                </div>

                                <h3 class="text-base sm:text-lg font-extrabold text-slate-900 group-hover:text-rose-600 transition-colors">
                                    {{ $projek->judul }}
                                </h3>

                                <p class="text-[11px] text-slate-600 mt-1 leading-snug font-medium">
                                    {{ $projek->deskripsi }}
                                </p>

                                <!-- 4-Panel Technical Highlights Grid -->
                                @if(!empty($projek->sorotan_teknis) && is_array($projek->sorotan_teknis))
                                    <div class="mt-2 grid grid-cols-2 gap-1.5 text-left">
                                        @foreach($projek->sorotan_teknis as $spek)
                                            <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                                <div class="flex items-center gap-1 {{ $spek['warna'] ?? 'text-rose-500' }} text-[10px] font-bold mb-0.5">
                                                    <i class="{{ $spek['ikon'] ?? 'fa-solid fa-microchip' }} text-[9px]"></i>
                                                    <span>{{ $spek['judul'] ?? 'Fitur' }}</span>
                                                </div>
                                                <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">{{ $spek['keterangan'] ?? '' }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Bottom Actions & Download Buttons -->
                            <div class="mt-2.5 pt-2 border-t border-slate-100 flex flex-col gap-1.5">
                                <div class="flex items-center justify-between text-[10px] text-slate-500 font-bold px-0.5">
                                    <span class="flex items-center gap-1"><i class="fa-solid fa-circle-nodes text-cyan-600 text-[9px]"></i> Tautan & Aksi:</span>
                                    <span class="text-[9px] text-slate-400 font-mono">{{ $projek->kategori }}</span>
                                </div>
                                <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5">
                                    @if($projek->tautan_unduh_apk)
                                        <a href="{{ asset($projek->tautan_unduh_apk) }}" download class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                            <i class="fa-brands fa-android text-[10px]"></i>
                                            <span>APK ANDROID</span>
                                        </a>
                                    @endif

                                    @if($projek->tautan_unduh_desktop)
                                        <a href="{{ asset($projek->tautan_unduh_desktop) }}" download class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                            <i class="fa-brands fa-windows text-[10px]"></i>
                                            <span>DESKTOP (WIN)</span>
                                        </a>
                                    @endif

                                    @if($projek->tautan_demo)
                                        <a href="{{ $projek->tautan_demo }}" target="_blank" class="flex-1 min-w-[100px] px-2.5 py-1.5 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider transition-all flex items-center justify-center gap-1">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                                            <span>LIVE DEMO</span>
                                        </a>
                                    @endif

                                    @if($projek->tautan_repositori)
                                        <a href="{{ $projek->tautan_repositori }}" target="_blank" class="flex-1 min-w-[100px] px-2.5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider transition-all flex items-center justify-center gap-1">
                                            <i class="fa-brands fa-github text-[10px]"></i>
                                            <span>GITHUB</span>
                                        </a>
                                    @endif

                                    <button type="button" onclick="bukaModalProjek({{ $index }})" class="px-2.5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider transition-all flex items-center justify-center gap-1 active:scale-95 flex-shrink-0 cursor-pointer" title="Perbesar Gambar">
                                        <i class="fa-solid fa-expand text-[9px]"></i>
                                        <span>ZOOM</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="w-full py-12 text-center text-slate-400 text-xs bg-white rounded-2xl border border-slate-200">
                    Belum ada data projek yang tersimpan.
                </div>
            @endforelse

        </div>

        <!-- Bottom Slider Bar: Swipe Hint & Clickable Dot Pagination -->
        <div class="mt-2.5 flex flex-col sm:flex-row items-center justify-between gap-2 px-1">
            <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium">
                <i class="fa-solid fa-arrows-left-right text-slate-400 animate-pulse text-[10px]"></i>
                <span>Geser horizontal atau klik panah untuk melihat projek lainnya</span>
            </div>

            <!-- Clickable Dots Indicator -->
            <div id="project-dots" class="flex items-center gap-1.5">
                @foreach($daftarProjek as $pIdx => $pItem)
                    <button type="button" onclick="goToProjectSlide({{ $pIdx }})" class="p-dot {{ $pIdx === 0 ? 'w-6 bg-slate-900' : 'w-1.5 bg-slate-300 hover:bg-slate-400' }} h-1.5 rounded-full transition-all duration-300 cursor-pointer" aria-label="Lihat Projek {{ $pIdx + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>
