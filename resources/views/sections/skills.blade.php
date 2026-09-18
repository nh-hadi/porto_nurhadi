<!-- ========================================== -->
<!-- SKILLS & SERVICES HORIZONTAL SLIDER SECTION -->
<!-- ========================================== -->
<section id="skills" class="mt-16 w-full text-left">
    <!-- Section Header & Slider Controls -->
    <div class="flex items-end justify-between mb-4 px-1">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
                <span class="font-racing font-bold text-xs uppercase tracking-widest bg-gradient-to-r from-rose-600 to-amber-600 bg-clip-text text-transparent">
                    KOMPETENSI UTAMA
                </span>
            </div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                Keahlian & Kemampuan Teknis
            </h2>
        </div>

        <!-- Navigation Slider Arrows -->
        <div class="flex items-center gap-1.5">
            <button onclick="scrollSkills('left')" class="w-8 h-8 rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all flex items-center justify-center shadow-xs active:scale-90" aria-label="Slide Kiri">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            <button onclick="scrollSkills('right')" class="w-8 h-8 rounded-lg bg-white border border-slate-300 text-slate-700 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all flex items-center justify-center shadow-xs active:scale-90" aria-label="Slide Kanan">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
        </div>
    </div>

    <!-- Swipeable / Scrollable Horizontal Container (Full Bleed on Mobile) -->
    <div id="skills-slider" class="-mx-4 px-4 sm:mx-0 sm:px-0 flex gap-3.5 sm:gap-4 overflow-x-auto pb-4 pt-1 snap-x snap-mandatory scroll-smooth no-scrollbar select-none cursor-grab active:cursor-grabbing" style="scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch; scroll-padding-left: 1rem;">
        
        <!-- Kotak 1: Pembuatan Prototype IoT -->
        <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 to-rose-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            <div>
                <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-500/10 to-rose-500/10 border border-amber-200 flex items-center justify-center text-amber-600 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-microchip text-lg"></i>
                    </div>
                    <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                        PROTOTYPE IOT
                    </span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-rose-600 transition-colors">Pembuatan Prototype IoT</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-3">
                    Rancang bangun prototype alat IoT dari nol berbasis <span class="text-slate-800 font-semibold">ESP32, ESP8266, Arduino</span>, integrasi sensor & aktuator, wiring rapi, hingga siap uji coba.
                </p>
            </div>
            <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 font-bold">ESP32</span>
                <span class="px-2 py-0.5 rounded bg-cyan-100 text-cyan-800 font-bold">ESP8266</span>
                <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold">Arduino</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">Alat Jadi</span>
            </div>
        </div>

        <!-- Kotak 2: Desain PCB Kustom -->
        <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-rose-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            <div>
                <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500/10 to-rose-500/10 border border-purple-200 flex items-center justify-center text-purple-600 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-layer-group text-lg"></i>
                    </div>
                    <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-purple-50 text-purple-700 border border-purple-200">
                        DESAIN PCB
                    </span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-purple-600 transition-colors">Desain PCB Kustom</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-3">
                    Perancangan skematik & layout PCB presisi menggunakan <span class="text-slate-800 font-semibold">EasyEDA</span> & <span class="text-slate-800 font-semibold">EAGLE PCB</span>, file gerber siap fabrikasi, dan perakitan SMD/THT.
                </p>
            </div>
            <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-800 font-bold">EasyEDA</span>
                <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 font-bold">EAGLE PCB</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">Gerber File</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">SMD / THT</span>
            </div>
        </div>

        <!-- Kotak 3: Aplikasi Laravel & Flutter -->
        <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-400 to-rose-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            <div>
                <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500/10 to-rose-500/10 border border-cyan-200 flex items-center justify-center text-cyan-600 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-mobile-screen-button text-lg"></i>
                    </div>
                    <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-cyan-50 text-cyan-700 border border-cyan-200">
                        LARAVEL & FLUTTER
                    </span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-cyan-600 transition-colors">Aplikasi Web & Mobile</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-3">
                    Pembuatan web dashboard berbasis <span class="text-slate-800 font-semibold">Laravel</span> serta aplikasi mobile Android/iOS dengan <span class="text-slate-800 font-semibold">Flutter</span> untuk monitoring & kontrol perangkat IoT secara realtime.
                </p>
            </div>
            <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold">Laravel</span>
                <span class="px-2 py-0.5 rounded bg-cyan-100 text-cyan-800 font-bold">Flutter</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">REST API</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">MQTT / Realtime</span>
            </div>
        </div>

        <!-- Kotak 4: Projek & Portofolio Lain -->
        <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 to-cyan-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            <div>
                <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500/10 to-cyan-500/10 border border-emerald-200 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-folder-open text-lg"></i>
                    </div>
                    <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                        PROJEK & RISET
                    </span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-emerald-600 transition-colors">Projek & Portofolio Lain</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-3">
                    Kumpulan pengerjaan smart system, automasi rumah / hidroponik, monitoring sensor jarak jauh, serta eksperimen riset custom.
                </p>
            </div>
            <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800 font-bold">Smart System</span>
                <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 font-bold">Automasi</span>
                <span class="px-2 py-0.5 rounded bg-cyan-100 text-cyan-800 font-bold">Monitoring Data</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">Katalog Karya</span>
            </div>
        </div>

        <!-- Kotak 5: Troubleshooting & Firmware -->
        <div class="skill-card w-[82vw] xs:w-[78vw] sm:w-72 md:w-80 flex-shrink-0 snap-start bg-white rounded-2xl p-4 border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative group overflow-hidden flex flex-col justify-between">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-rose-500 to-amber-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            <div>
                <div class="flex items-start justify-between mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-500/10 to-amber-500/10 border border-rose-200 flex items-center justify-center text-rose-600 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-screwdriver-wrench text-lg"></i>
                    </div>
                    <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full bg-rose-50 text-rose-700 border border-rose-200">
                        TESTING & REWORK
                    </span>
                </div>
                <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-rose-600 transition-colors">Firmware & Hardware Testing</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-3">
                    Pemrograman C/C++ Arduino IDE, diagnosa sinyal osiloskop, logic analyzer I2C/SPI/UART, serta perakitan solder komponen SMD presisi.
                </p>
            </div>
            <div class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[10px] font-semibold text-slate-600">
                <span class="px-2 py-0.5 rounded bg-rose-100 text-rose-800 font-bold">Arduino C/C++</span>
                <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800 font-bold">Soldering SMD</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">Oscilloscope</span>
                <span class="px-2 py-0.5 rounded bg-slate-100">Logic Analyzer</span>
            </div>
        </div>

    </div>

    <!-- Slide Indicator Hint & Pagination Dots -->
    <div class="flex items-center justify-between text-[11px] text-slate-400 font-medium px-1 mt-2">
        <span class="flex items-center gap-1.5 text-slate-500 text-[11px]">
            <i class="fa-solid fa-hand-pointer text-[10px] text-rose-500 animate-bounce"></i>
            <span>Geser kartu untuk melihat lainnya</span>
        </span>
        
        <!-- Interactive Dots for Mobile & Desktop -->
        <div class="flex items-center gap-1.5" id="slider-dots">
            <button onclick="goToSlide(0)" class="dot w-4 h-1.5 rounded-full bg-rose-500 transition-all duration-300" aria-label="Slide 1"></button>
            <button onclick="goToSlide(1)" class="dot w-1.5 h-1.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 2"></button>
            <button onclick="goToSlide(2)" class="dot w-1.5 h-1.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 3"></button>
            <button onclick="goToSlide(3)" class="dot w-1.5 h-1.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 4"></button>
            <button onclick="goToSlide(4)" class="dot w-1.5 h-1.5 rounded-full bg-slate-300 transition-all duration-300" aria-label="Slide 5"></button>
        </div>
    </div>
</section>
