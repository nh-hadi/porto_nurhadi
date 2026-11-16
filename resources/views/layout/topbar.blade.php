@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
    $topbarBorderGradient = $temaAktif['border'];
    $brandTextGradient = $temaAktif['text_gradient'];
    $topbarBtnGradient = $temaAktif['btn'] . ' ' . $temaAktif['btn_shadow'];
@endphp
<!-- ========================================== -->
<!-- TOPBAR RACING WARNA-WARNI (Full Width & Sleek) -->
<!-- ========================================== -->
<header id="topbar-racing" class="w-full sticky top-0 z-50 px-2 sm:px-4 lg:px-6 py-1.5">
    <!-- Animated Racing Multi-color Gradient Border Box -->
    <div class="relative w-full rounded-lg p-[2px] bg-gradient-to-r {{ $topbarBorderGradient }} bg-[length:300%_100%] animate-gradient shadow-md shadow-rose-500/10">
        <!-- Inner Light Card Container -->
        <div class="bg-gradient-to-r from-white via-slate-50 to-amber-50/30 rounded-[6px] px-4 sm:px-6 h-12 flex items-center justify-between border border-white/80">
            
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-2.5 group">
                <div class="relative w-8 h-8 rounded-md bg-gradient-to-br {{ $topbarBorderGradient }} p-[1.5px] shadow-sm shadow-rose-500/20 group-hover:scale-105 group-hover:rotate-3 transition-all overflow-hidden flex-shrink-0">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Nurhadi" class="w-full h-full object-contain rounded-[4.5px] bg-white p-0.5">
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-1.5">
                        <span class="font-racing font-extrabold text-slate-900 tracking-wider text-sm uppercase inline-flex">
                            @foreach($pengaturan->namaPerHuruf('topbar') as $itemHuruf)
                                @if($itemHuruf['char'] === '&nbsp;')
                                    <span class="inline-block w-1.5"></span>
                                @else
                                    <span class="inline-block transition-transform duration-150 group-hover:scale-105 {{ $itemHuruf['color'] }}">
                                        {{ $itemHuruf['char'] }}
                                    </span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                    <span class="text-[9px] text-slate-500 font-bold tracking-widest uppercase leading-none">{{ $pengaturan->tagline ?? 'IoT, Hardware, Laravel & Flutter' }}</span>
                </div>
            </a>

            <!-- Racing Telemetry Digital Clock & Date Widget (Center / Desk) -->
            <div class="hidden xl:flex items-center gap-2 bg-slate-950 text-white rounded-md border border-slate-800 px-2.5 py-1 shadow-xs">
                <!-- Slanted Racing Decal Stripes -->
                <div class="flex items-center gap-[2px] transform -skew-x-[22deg]">
                    <span class="w-[2.5px] h-3.5 bg-amber-400 rounded-[0.5px]"></span>
                    <span class="w-[2.5px] h-3.5 bg-rose-500 rounded-[0.5px]"></span>
                    <span class="w-[2.5px] h-3.5 bg-cyan-400 rounded-[0.5px]"></span>
                </div>
                <!-- Hari & Tanggal -->
                <div class="flex items-center gap-1.5 border-r border-slate-800 pr-2 pl-0.5">
                    <i class="fa-regular fa-calendar-days text-[9px] text-cyan-400"></i>
                    <span class="racing-clock-day text-[8px] font-racing font-extrabold text-amber-400 uppercase tracking-widest leading-none">
                        {{ strtoupper(\Carbon\Carbon::now()->locale('id')->isoFormat('dddd')) }}
                    </span>
                    <span class="racing-clock-date text-[9px] font-mono font-bold text-slate-200 tracking-wider">
                        {{ strtoupper(\Carbon\Carbon::now()->locale('id')->isoFormat('D MMM Y')) }}
                    </span>
                </div>
                <!-- Jam & Detik -->
                <div class="flex items-center gap-1">
                    <div class="flex items-baseline gap-0.5 font-racing font-black text-white text-xs tracking-wider">
                        <span class="racing-clock-hours-min text-white">{{ date('H:i') }}</span>
                        <span class="text-amber-400 animate-pulse font-mono">:</span>
                        <span class="racing-clock-seconds font-mono text-[9.5px] text-cyan-400 bg-slate-900 border border-slate-800 px-1 py-0.2 rounded font-bold">{{ date('s') }}</span>
                    </div>
                    <span class="px-1 py-0.2 rounded bg-gradient-to-r {{ $temaAktif['gradient'] }} text-white text-[7px] font-racing font-extrabold tracking-widest shadow-2xs">WIB</span>
                </div>
            </div>

            <!-- Desktop Navigation Menu (Tampil Semua di Mode Desktop) -->
            <nav class="hidden lg:flex items-center gap-1.5">
                <a href="#home" class="px-3 py-1.5 rounded-md font-bold text-xs uppercase tracking-wider bg-gradient-to-r {{ $topbarBtnGradient }} text-white shadow-sm hover:scale-105 transition-all flex items-center gap-1.5">
                    <i class="fa-solid fa-house text-[10px]"></i>
                    <span>Beranda</span>
                </a>
                <a href="#iot" class="px-2.5 py-1.5 rounded-md font-semibold text-xs tracking-wider text-slate-700 hover:bg-amber-100/70 hover:text-amber-700 transition-all flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    <span>Prototype IoT</span>
                </a>
                <a href="#pcb" class="px-2.5 py-1.5 rounded-md font-semibold text-xs tracking-wider text-slate-700 hover:bg-purple-100/70 hover:text-purple-700 transition-all flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                    <span>Desain PCB</span>
                </a>
                <a href="#apps" class="px-2.5 py-1.5 rounded-md font-semibold text-xs tracking-wider text-slate-700 hover:bg-cyan-100/70 hover:text-cyan-700 transition-all flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-500"></span>
                    <span>Laravel & Flutter</span>
                </a>
                <a href="#store" class="px-2.5 py-1.5 rounded-md font-semibold text-xs tracking-wider text-slate-700 hover:bg-rose-100/70 hover:text-rose-700 transition-all flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                    <span>Toko IDS</span>
                </a>
                <a href="#contact" class="ml-1 px-3 py-1.5 rounded-md bg-gradient-to-r {{ $topbarBtnGradient }} text-white font-racing font-bold text-[10px] tracking-wider shadow-sm hover:scale-105 transition-all flex items-center gap-1.5">
                    <span>HUBUNGI</span>
                    <i class="fa-solid fa-arrow-right text-[8px]"></i>
                </a>
            </nav>

            <!-- Racing Menu Toggle Button (Parallelogram / Jajar Genjang Lines + MENU Label) -->
            <div class="flex lg:hidden items-center gap-1.5">
                <!-- Mobile Racing Clock -->
                <div class="flex items-center gap-1 bg-slate-950 text-white rounded-md border border-slate-800 px-2 py-1 shadow-2xs font-racing text-[10px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span class="racing-clock-hours-min text-white font-bold">{{ date('H:i') }}</span>
                    <span class="text-amber-400 text-[8px] font-mono font-bold">WIB</span>
                </div>

                <button type="button" onclick="toggleRacingMenu()" id="btn-racing-menu" class="relative group overflow-hidden rounded-md bg-gradient-to-r {{ $topbarBorderGradient }} p-[1.5px] shadow-md shadow-rose-500/25 hover:shadow-cyan-500/40 transition-all hover:scale-105 active:scale-95 focus:outline-none" aria-label="Toggle Menu">
                    <div class="bg-slate-900 group-hover:bg-slate-800 transition-colors rounded-[4.5px] px-3 py-1.5 flex items-center gap-2">
                        <!-- Garis Jajar Genjang Racing (Slanted Parallelogram Stripes) -->
                        <div class="flex flex-col justify-center items-end gap-[3px]">
                            <span id="racing-bar-1" class="block h-[2.5px] w-4 bg-gradient-to-r from-amber-400 to-rose-500 transform -skew-x-[28deg] rounded-[1px] transition-all group-hover:w-5"></span>
                            <span id="racing-bar-2" class="block h-[2.5px] w-5 bg-gradient-to-r from-rose-500 to-purple-500 transform -skew-x-[28deg] rounded-[1px] transition-all"></span>
                            <span id="racing-bar-3" class="block h-[2.5px] w-3 bg-gradient-to-r from-purple-500 to-cyan-400 transform -skew-x-[28deg] rounded-[1px] transition-all group-hover:w-5"></span>
                        </div>
                        <span class="font-racing font-extrabold text-[11px] text-white tracking-wider uppercase">MENU</span>
                    </div>
                </button>
            </div>

        </div>

        <!-- Dropdown Menu (Premium Sleek Light Theme with Refined Radius) -->
        <div id="racing-dropdown-menu" class="hidden absolute top-full right-0 mt-2 z-50 w-72 sm:w-80 transition-all">
            <!-- Subtle Gradient Border Frame with Slim Radius -->
            <div class="p-[1.5px] rounded-lg bg-gradient-to-br {{ $topbarBorderGradient }} shadow-2xl shadow-slate-400/20">
                <div class="bg-white/95 backdrop-blur-2xl rounded-[6px] p-3 text-slate-800 border border-white/90">
                    
                    <!-- Clean Light Header -->
                    <div class="flex items-center justify-between pb-2 mb-1.5 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <div class="relative w-4 h-4 rounded-[3px] overflow-hidden flex-shrink-0">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                            </div>
                            <span class="font-racing font-bold text-[11px] tracking-wider text-slate-800 uppercase">Navigasi Portfolio</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full {{ $temaAktif['ping'] }} animate-pulse"></span>
                            <span class="text-[8.5px] font-racing font-bold px-1.5 py-0.5 rounded-[4px] bg-slate-100 border border-slate-200 uppercase inline-flex">
                                @foreach($pengaturan->namaPerHuruf('dropdown') as $itemHuruf)
                                    @if($itemHuruf['char'] === '&nbsp;')
                                        <span class="inline-block w-1"></span>
                                    @else
                                        <span class="{{ $itemHuruf['color'] }}">{{ $itemHuruf['char'] }}</span>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    </div>

                    <!-- Refined Navigation Items with Dividers & Slanted Indicators -->
                    <div class="flex flex-col divide-y divide-slate-100/90">
                        
                        <!-- Beranda -->
                        <a href="#home" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-rose-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-rose-50 border border-rose-100/80 flex items-center justify-center text-rose-500 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-house text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-xs leading-none group-hover:text-rose-600 transition-colors">Beranda</span>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">Profil & Ringkasan Singkat</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-rose-500 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                        <!-- Pembuatan Prototype IoT -->
                        <a href="#iot" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-amber-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-amber-50 border border-amber-100/80 flex items-center justify-center text-amber-500 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-microchip text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-bold text-xs leading-none group-hover:text-amber-600 transition-colors">Pembuatan Prototype IoT</span>
                                        <span class="text-[8px] font-extrabold px-1 rounded bg-amber-100 text-amber-700 uppercase">Jasa</span>
                                    </div>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">ESP32, ESP8266, Sensor & Alat Jadi</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-amber-500 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                        <!-- Desain PCB & Elektronik -->
                        <a href="#pcb" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-purple-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-purple-50 border border-purple-100/80 flex items-center justify-center text-purple-500 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-layer-group text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-xs leading-none group-hover:text-purple-600 transition-colors">Desain PCB & Elektronik</span>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">Skematik EasyEDA, EAGLE & Gerber</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-purple-500 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                        <!-- Aplikasi Laravel & Flutter -->
                        <a href="#apps" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-cyan-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-cyan-50 border border-cyan-100/80 flex items-center justify-center text-cyan-500 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-mobile-screen-button text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-bold text-xs leading-none group-hover:text-cyan-600 transition-colors">Laravel & Flutter</span>
                                        <span class="text-[8px] font-extrabold px-1 rounded bg-cyan-100 text-cyan-700 uppercase">App</span>
                                    </div>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">Web Dashboard & Aplikasi Mobile IoT</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-cyan-400 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                        <!-- Projek & Portofolio Lain -->
                        <a href="#projects" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-emerald-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-emerald-50 border border-emerald-100/80 flex items-center justify-center text-emerald-600 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-folder-open text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-bold text-xs leading-none group-hover:text-emerald-600 transition-colors">Projek & Portofolio Lain</span>
                                        <span class="text-[8px] font-extrabold px-1 rounded bg-emerald-100 text-emerald-700 uppercase">Katalog</span>
                                    </div>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">Automasi, Smart System & Riset</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-emerald-500 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                        <!-- Toko IDS Official Store -->
                        <a href="#store" class="flex items-center justify-between py-2 px-2 rounded-[5px] text-slate-700 hover:text-slate-950 hover:bg-gradient-to-r hover:from-rose-50/70 hover:to-transparent transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded-[4px] bg-rose-50 border border-rose-100/80 flex items-center justify-center text-rose-500 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-cart-shopping text-[10px]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex items-center gap-1.5">
                                        <span class="font-bold text-xs leading-none group-hover:text-rose-600 transition-colors">Toko IDS Official</span>
                                        <span class="text-[8px] font-extrabold px-1 rounded bg-rose-100 text-rose-700 uppercase">Store</span>
                                    </div>
                                    <span class="text-[9px] text-slate-400 font-medium mt-0.5">Produk Modul, Kit & Hardware</span>
                                </div>
                            </div>
                            <span class="w-1.5 h-3 bg-rose-500 transform -skew-x-[28deg] rounded-[1px] opacity-0 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all"></span>
                        </a>

                    </div>

                    <!-- Clean Footer CTA with Refined Radius -->
                    <div class="mt-2 pt-2 border-t border-slate-100">
                        <a href="#contact" class="flex items-center justify-center gap-2 w-full py-2 rounded-[5px] bg-gradient-to-r {{ $topbarBtnGradient }} text-white font-racing font-bold text-[10px] tracking-wider shadow-sm hover:opacity-95 transition-all hover:scale-[1.01] active:scale-95">
                            <span>HUBUNGI SAYA</span>
                            <i class="fa-solid fa-arrow-right text-[8px]"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Custom Styles for Racing Gradient Animation -->
<style>
    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animate-gradient {
        animation: gradientShift 4s ease infinite;
    }
</style>

<script>
    function toggleRacingMenu() {
        const menu = document.getElementById('racing-dropdown-menu');
        if (!menu) return;

        const isHidden = menu.classList.contains('hidden');
        if (isHidden) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }

    // Tutup menu otomatis jika klik di luar area
    document.addEventListener('click', function(e) {
        const menu = document.getElementById('racing-dropdown-menu');
        const btn = document.getElementById('btn-racing-menu');
        if (!menu || !btn) return;

        if (!menu.contains(e.target) && !btn.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Tutup menu otomatis jika link navigasi diklik
    document.querySelectorAll('#racing-dropdown-menu a').forEach(link => {
        link.addEventListener('click', () => {
            const menu = document.getElementById('racing-dropdown-menu');
            if (menu) menu.classList.add('hidden');
        });
    });

    // Realtime Racing Clock & Date Updater
    function updateRacingClock() {
        const now = new Date();
        const hariList = ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU'];
        const bulanList = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV', 'DES'];

        const hari = hariList[now.getDay()];
        const tgl = String(now.getDate()).padStart(2, '0');
        const bulan = bulanList[now.getMonth()];
        const tahun = now.getFullYear();

        const jam = String(now.getHours()).padStart(2, '0');
        const menit = String(now.getMinutes()).padStart(2, '0');
        const detik = String(now.getSeconds()).padStart(2, '0');

        document.querySelectorAll('.racing-clock-day').forEach(el => el.innerText = hari);
        document.querySelectorAll('.racing-clock-date').forEach(el => el.innerText = `${tgl} ${bulan} ${tahun}`);
        document.querySelectorAll('.racing-clock-hours-min').forEach(el => el.innerText = `${jam}:${menit}`);
        document.querySelectorAll('.racing-clock-seconds').forEach(el => el.innerText = detik);
    }

    setInterval(updateRacingClock, 1000);
    document.addEventListener('DOMContentLoaded', updateRacingClock);
</script>