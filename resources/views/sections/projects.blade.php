<!-- ========================================== -->
<!-- DAFTAR PROJEK & PORTOFOLIO SECTION (#projects) -->
<!-- ========================================== -->
<section id="projects" class="mt-10 sm:mt-12 w-full text-left">
    <!-- Section Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-4 px-1 gap-3">
        <div>
            <div class="flex items-center gap-2 mb-0.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span class="font-racing font-bold text-[11px] uppercase tracking-widest bg-gradient-to-r from-emerald-600 to-cyan-600 bg-clip-text text-transparent">
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
                <button type="button" onclick="goToProjectSlide(0)" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 transition-colors cursor-pointer text-[11px]">Desain PCB & IoT</button>
                <button type="button" onclick="goToProjectSlide(1)" class="px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 transition-colors cursor-pointer text-[11px]">Web Laravel</button>
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
                <span id="project-total-num" class="text-slate-600 font-bold">2</span>
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
            
            <!-- PROJEK 1: SMART DIGITAL PSU V1.0.2 (Hardware PCB & Flutter Desktop/Mobile App) -->
            <div class="project-card w-full flex-shrink-0 snap-start bg-white rounded-xl border border-slate-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    <!-- Left: Interactive Dual Media Showcase (App & PCB Switcher) -->
                    <div class="lg:col-span-6 bg-slate-950 p-3.5 sm:p-4 flex flex-col justify-between relative overflow-hidden">
                        <!-- Ambient Lighting -->
                        <div class="absolute -top-12 -left-12 w-48 h-48 bg-cyan-600/20 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-rose-600/20 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Top Bar inside Media Box with Mode Switcher -->
                        <div class="relative z-10 flex flex-wrap items-center justify-between mb-2 gap-2">
                            <div class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="font-racing text-[10px] font-bold text-slate-200 uppercase tracking-wider">SMART DIGITAL PSU V1.0.2</span>
                            </div>

                            <!-- Tab Switcher: PCB Layout (Default) vs Desktop App -->
                            <div class="flex items-center bg-slate-900 border border-slate-800 p-0.5 rounded-lg text-[9px] sm:text-[10px] font-bold">
                                <button type="button" onclick="switchPsuPreview('pcb')" id="tab-psu-pcb" class="px-2 py-1 rounded-md bg-gradient-to-r from-purple-600 to-rose-600 text-white transition-all flex items-center gap-1">
                                    <i class="fa-solid fa-microchip text-[9px]"></i>
                                    <span>Desain PCB</span>
                                </button>
                                <button type="button" onclick="switchPsuPreview('app')" id="tab-psu-app" class="px-2 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1">
                                    <i class="fa-solid fa-desktop text-[9px]"></i>
                                    <span>Aplikasi Desktop</span>
                                </button>
                            </div>
                        </div>

                        <!-- Main Image Preview with Interactive Lightbox Trigger -->
                        <div class="relative z-10 my-auto rounded-lg overflow-hidden border border-slate-800 bg-slate-900 shadow-xl group/img cursor-pointer" onclick="openCurrentPsuModal()">
                            <!-- Default PCB Image -->
                            <img id="psu-preview-img" src="{{ asset('projects/smart-psu/pcb/smart-psu-pcb.png') }}" alt="Desain PCB Smart Digital PSU V1.0.2" class="w-full h-auto max-h-[210px] sm:max-h-[230px] object-contain transform group-hover/img:scale-102 transition-transform duration-500" decoding="async">
                            
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
                                <span class="text-amber-400 font-racing">NH-HADI</span>
                            </div>
                            <span class="text-slate-400 font-mono text-[9px]">EAGLE / EasyEDA</span>
                        </div>
                    </div>

                    <!-- Right: Comprehensive Details, 4-Panel Highlights & Dual Download Buttons -->
                    <div class="lg:col-span-6 p-3.5 sm:p-4 flex flex-col justify-between bg-white">
                        <div>
                            <!-- Header Badges -->
                            <div class="flex flex-wrap items-center gap-1.5 mb-1.5">
                                <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[9px] font-racing font-bold">
                                    PROTOTYPE HARDWARE
                                </span>
                                <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200 text-[9px] font-bold">
                                    ESP-12F IoT
                                </span>
                            </div>

                            <h3 class="text-base sm:text-lg font-extrabold text-slate-900 group-hover:text-rose-600 transition-colors">
                                Smart Digital PSU V1.0.2
                            </h3>

                            <p class="text-[11px] text-slate-600 mt-1 leading-snug font-medium">
                                Modul catu daya digital pintar (*Smart Digital Power Supply Unit V1.0.2*) terintegrasi mikrokontroler WiFi <strong class="text-slate-900">ESP-12F</strong>, output variabel 1.5V–30V, UART RX/TX, multi-probe (Diode, Ohm, Volt), serta sensor presisi <strong class="text-slate-900">ADS1115 & INA3221</strong> dengan kontrol aplikasi <strong class="text-cyan-700">Flutter</strong>.
                            </p>

                            <!-- 4-Panel Technical Highlights Grid -->
                            <div class="mt-2 grid grid-cols-2 gap-1.5 text-left">
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-rose-500 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-microchip text-[9px]"></i>
                                        <span>Mikrokontroler</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">ESP12f Wi-Fi Chip</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-amber-500 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-bolt text-[9px]"></i>
                                        <span>Output & Input</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">PSU 1.5V - Up to 30V, UART RX/TX, Probe: Diode, Ohm, Volt</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-cyan-500 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-chart-simple text-[9px]"></i>
                                        <span>Sensor & Probe</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">ADS1115 (16-bit ADC), INA3221</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-purple-500 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-wifi text-[9px]"></i>
                                        <span>Koneksi & App</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">Wi-Fi IoT Sync, Web Dashboard & Flutter App</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Download APK, Windows Desktop & Actions -->
                        <div class="mt-2.5 pt-2 border-t border-slate-100 flex flex-col gap-1.5">
                            <div class="flex items-center justify-between text-[10px] text-slate-500 font-bold px-0.5">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-download text-cyan-600 text-[9px]"></i> Unduh Aplikasi:</span>
                                <span class="text-[9px] text-slate-400 font-mono">v1.0.2 / x64</span>
                            </div>
                            <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5">
                                <!-- Download APK Mobile Android -->
                                <a href="{{ asset('projects/smart-psu/downloads/smart-psu-v1.0.2.apk') }}" download class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                    <i class="fa-brands fa-android text-[10px]"></i>
                                    <span>APK ANDROID</span>
                                </a>

                                <!-- Download Windows Desktop Application -->
                                <a href="{{ asset('projects/smart-psu/downloads/SmartPSU-Windows-x64.zip') }}" download class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                    <i class="fa-brands fa-windows text-[10px]"></i>
                                    <span>DESKTOP (WIN)</span>
                                </a>

                                <!-- Full Image Preview Button -->
                                <button onclick="openCurrentPsuModal()" class="px-2.5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider transition-all flex items-center justify-center gap-1 active:scale-95 flex-shrink-0" title="Perbesar Gambar">
                                    <i class="fa-solid fa-expand text-[9px]"></i>
                                    <span>PREVIEW</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- PROJEK 2: SISTEM INFORMASI PERPUSTAKAAN DIGITAL (PERPUSDIGI) -->
            <div class="project-card w-full flex-shrink-0 snap-start bg-white rounded-xl border border-slate-200/90 shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    <!-- Left: Interactive Dual Media Showcase (Dashboard & Katalog) -->
                    <div class="lg:col-span-6 bg-slate-950 p-3.5 sm:p-4 flex flex-col justify-between relative overflow-hidden">
                        <!-- Ambient Lighting -->
                        <div class="absolute -top-12 -left-12 w-48 h-48 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
                        <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>

                        <!-- Top Bar inside Media Box with Mode Switcher -->
                        <div class="relative z-10 flex flex-wrap items-center justify-between mb-2 gap-2">
                            <div class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="font-racing text-[10px] font-bold text-slate-200 uppercase tracking-wider">PERPUSDIGI v2.4 PRO</span>
                            </div>

                            <!-- Tab Switcher: Dashboard vs Katalog -->
                            <div class="flex items-center bg-slate-900 border border-slate-800 p-0.5 rounded-lg text-[9px] sm:text-[10px] font-bold">
                                <button type="button" onclick="switchPerpusPreview('dashboard')" id="tab-perpus-dash" class="px-2 py-1 rounded-md bg-gradient-to-r from-blue-600 to-indigo-600 text-white transition-all flex items-center gap-1">
                                    <i class="fa-solid fa-chart-pie text-[9px]"></i>
                                    <span>Dashboard Admin</span>
                                </button>
                                <button type="button" onclick="switchPerpusPreview('katalog')" id="tab-perpus-katalog" class="px-2 py-1 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1">
                                    <i class="fa-solid fa-book-open text-[9px]"></i>
                                    <span>Katalog & OPAC</span>
                                </button>
                            </div>
                        </div>

                        <!-- Main Image Preview with Interactive Lightbox Trigger -->
                        <div class="relative z-10 my-auto rounded-lg overflow-hidden border border-slate-800 bg-slate-900 shadow-xl group/img cursor-pointer" onclick="openCurrentPerpusModal()">
                            <img id="perpus-preview-img" src="{{ asset('projects/perpustakaan/perpus-dashboard.jpg') }}" alt="Sistem Informasi Perpustakaan Digital" class="w-full h-auto max-h-[210px] sm:max-h-[230px] object-contain transform group-hover/img:scale-102 transition-transform duration-500" decoding="async">
                            
                            <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-1.5 text-white text-[11px] font-bold backdrop-blur-[2px]">
                                <i class="fa-solid fa-expand text-xs"></i>
                                <span>Klik untuk Perbesar Screenshot</span>
                            </div>
                        </div>

                        <!-- Bottom Metadata on Image Box -->
                        <div class="relative z-10 mt-2 flex items-center justify-between text-[10px] text-slate-400 border-t border-slate-800/80 pt-1.5">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-300 font-bold">FULLSTACK LARAVEL</span>
                                <span>•</span>
                                <span class="text-cyan-400 font-racing">RESPONSIVE WEB APP</span>
                            </div>
                            <span class="text-slate-400 font-mono text-[9px]">MYSQL • TAILWIND CSS</span>
                        </div>
                    </div>

                    <!-- Right: Comprehensive Details & 4-Panel Highlights -->
                    <div class="lg:col-span-6 p-3.5 sm:p-4 flex flex-col justify-between bg-white">
                        <div>
                            <!-- Header Badges -->
                            <div class="flex flex-wrap items-center gap-1.5 mb-1.5">
                                <span class="px-2 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200 text-[9px] font-racing font-bold">
                                    WEB APPLICATION
                                </span>
                                <span class="px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200 text-[9px] font-bold">
                                    LARAVEL & MYSQL
                                </span>
                            </div>

                            <h3 class="text-base sm:text-lg font-extrabold text-slate-900 group-hover:text-blue-600 transition-colors">
                                PerpusDigi — Sistem Informasi Perpustakaan
                            </h3>

                            <p class="text-[11px] text-slate-600 mt-1 leading-snug font-medium">
                                Sistem informasi perpustakaan digital modern berbasis web dengan pencarian katalog cepat (OPAC), manajemen sirkulasi peminjaman/pengembalian otomatis, kalkulasi denda, serta analitik data tren buku real-time.
                            </p>

                            <!-- 4-Panel Technical Highlights Grid -->
                            <div class="mt-2 grid grid-cols-2 gap-1.5 text-left">
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-blue-600 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-server text-[9px]"></i>
                                        <span>Backend & Stack</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">Laravel 11, PHP 8.3, MySQL Relational DB</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-indigo-600 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-palette text-[9px]"></i>
                                        <span>Frontend UI</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">Tailwind CSS, Blade, Chart.js Analytics</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-emerald-600 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-book-bookmark text-[9px]"></i>
                                        <span>Sirkulasi & Denda</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">Auto Peminjaman, Pengembalian, & Hitung Denda</p>
                                </div>
                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100">
                                    <div class="flex items-center gap-1 text-purple-600 text-[10px] font-bold mb-0.5">
                                        <i class="fa-solid fa-shield-halved text-[9px]"></i>
                                        <span>Autentikasi & OPAC</span>
                                    </div>
                                    <p class="text-[9.5px] sm:text-[10px] text-slate-600 font-medium leading-tight">Multi-role (Admin/Anggota), Live Catalog Search</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Action Buttons -->
                        <div class="mt-2.5 pt-2 border-t border-slate-100 flex flex-col gap-1.5">
                            <div class="flex items-center justify-between text-[10px] text-slate-500 font-bold px-0.5">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-laptop-code text-blue-600 text-[9px]"></i> Screenshot Interface:</span>
                                <span class="text-[9px] text-slate-400 font-mono">2 Tampilan Utama</span>
                            </div>
                            <div class="flex flex-wrap sm:flex-nowrap items-center gap-1.5">
                                <button type="button" onclick="switchPerpusPreview('dashboard'); openCurrentPerpusModal();" class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                    <i class="fa-solid fa-chart-pie text-[10px]"></i>
                                    <span>DASHBOARD</span>
                                </button>

                                <button type="button" onclick="switchPerpusPreview('katalog'); openCurrentPerpusModal();" class="flex-1 min-w-[110px] px-2.5 py-1.5 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1">
                                    <i class="fa-solid fa-book-open text-[10px]"></i>
                                    <span>KATALOG</span>
                                </button>

                                <button type="button" onclick="openCurrentPerpusModal()" class="px-2.5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-[9px] sm:text-[9.5px] tracking-wider transition-all flex items-center justify-center gap-1 active:scale-95 flex-shrink-0" title="Perbesar Gambar">
                                    <i class="fa-solid fa-expand text-[9px]"></i>
                                    <span>ZOOM</span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bottom Slider Bar: Swipe Hint & Clickable Dot Pagination -->
        <div class="mt-2.5 flex flex-col sm:flex-row items-center justify-between gap-2 px-1">
            <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium">
                <i class="fa-solid fa-arrows-left-right text-slate-400 animate-pulse text-[10px]"></i>
                <span>Geser horizontal atau klik panah untuk melihat projek lainnya</span>
            </div>

            <!-- Clickable Dots Indicator -->
            <div id="project-dots" class="flex items-center gap-1.5">
                <button type="button" onclick="goToProjectSlide(0)" class="p-dot w-6 h-1.5 rounded-full bg-slate-900 transition-all duration-300 cursor-pointer" aria-label="Lihat Projek 1"></button>
                <button type="button" onclick="goToProjectSlide(1)" class="p-dot w-1.5 h-1.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer" aria-label="Lihat Projek 2"></button>
            </div>
        </div>
    </div>
</section>
