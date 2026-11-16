@php
    $pengaturanSitus = $pengaturan ?? \App\Models\PengaturanSitus::ambilData();
    $tema = $pengaturanSitus->temaTokens();
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Panel Admin') — {{ $pengaturanSitus->nama_toko ?? 'IDS Store Technology' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Fonts & Font Awesome Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Orbitron:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        racing: ['Orbitron', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; font-size: 13px; }
        .font-racing { font-family: 'Orbitron', sans-serif; }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            animation: gradientShift 4s ease infinite;
        }

        /* ================= Kapsul Jam Oval RGB Border Presisi ================= */
        .rgb-clock-capsule {
            display: inline-flex;
            align-items: center;
            padding: 2px;
            border-radius: 9999px;
            background: linear-gradient(90deg, #ff0055, #ff5500, #ffcc00, #00dd55, #00bbff, #7700ff, #ff0055);
            background-size: 300% 100%;
            animation: rgbFlow 4s linear infinite;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
        }
        @keyframes rgbFlow {
            0% { background-position: 0% 50%; }
            100% { background-position: 300% 50%; }
        }
        .rgb-clock-inner {
            background-color: #ffffff;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            padding: 4px 12px;
            gap: 10px;
            width: 100%;
            height: 100%;
        }

        /* Custom subtle scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* ================= Style Sidebar Sistem RT (#2a2185) ================= */
        :root {
            --sidebar-bg: #2a2185;
            --sidebar-hover-bg: #3a31a5;
            --sidebar-active-bg: #f1f5f9;
            --sidebar-active-text: #2a2185;
            --sidebar-text: #bfdbfe;
            --sidebar-width: 224px;
        }

        #sidebar {
            width: var(--sidebar-width);
            min-width: var(--sidebar-width);
            max-width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: #fff;
            transition: all 0.3s ease;
            height: 100vh;
            position: sticky;
            top: 0;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 40;
            display: flex;
            flex-direction: column;
        }

        #sidebar::-webkit-scrollbar { width: 0px; }

        /* Sidebar Header (White Card seperti Sistem RT) */
        #sidebar .sidebar-header {
            padding: 8px 10px;
            background: #ffffff;
            margin: 10px 10px 6px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        }

        .brand-name {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 0.78rem;
            letter-spacing: -0.2px;
            color: #2a2185;
            margin: 0;
            line-height: 1.15;
            white-space: nowrap;
        }

        .brand-tagline {
            font-size: 0.58rem;
            font-weight: 800;
            color: #64748b;
            letter-spacing: 0.6px;
            text-transform: uppercase;
        }

        .menu-label {
            font-size: 0.58rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.45);
            padding: 8px 16px 3px;
            margin: 0;
        }

        /* Sidebar Menu List */
        #sidebar ul.components {
            padding: 0;
            margin: 4px 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        #sidebar ul li {
            position: relative;
            width: 100%;
            margin-bottom: 3px;
        }

        #sidebar ul li a {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            padding: 7px 8px 7px 16px;
            color: rgba(255, 255, 255, 0.78);
            text-decoration: none;
            z-index: 5;
            transition: all 0.25s ease;
            white-space: nowrap;
            font-size: 0.85rem;
            font-weight: 600;
        }

        #sidebar ul li a i.menu-icon {
            font-size: 0.95rem;
            width: 24px;
            margin-right: 10px;
            text-align: center;
            flex-shrink: 0;
            opacity: 0.85;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        #sidebar ul li a span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex-grow: 1;
        }

        /* Hover Effect with Inverted Curves */
        #sidebar ul li:not(.active):hover {
            margin-left: 10px;
            width: calc(100% - 10px);
            border-top-left-radius: 35px;
            border-bottom-left-radius: 35px;
            background-color: var(--sidebar-hover-bg);
            z-index: 6;
        }

        #sidebar ul li:not(.active):hover a {
            color: #fff;
            padding-left: 18px;
            opacity: 1;
        }

        #sidebar ul li:not(.active):hover a::before {
            content: ""; position: absolute; right: 0; top: -25px; width: 25px; height: 25px;
            border-radius: 50%; box-shadow: 15px 15px 0 0 var(--sidebar-hover-bg); pointer-events: none;
        }
        #sidebar ul li:not(.active):hover a::after {
            content: ""; position: absolute; right: 0; bottom: -25px; width: 25px; height: 25px;
            border-radius: 50%; box-shadow: 15px -15px 0 0 var(--sidebar-hover-bg); pointer-events: none;
        }

        /* Specific Active (Inverted Curve menyatu mulus dengan #f1f5f9) */
        #sidebar ul li.active {
            margin-left: 10px;
            width: calc(100% - 10px);
            border-top-left-radius: 35px;
            border-bottom-left-radius: 35px;
            background-color: var(--sidebar-active-bg);
            z-index: 10;
        }

        #sidebar ul li.active a {
            color: var(--sidebar-active-text);
            font-weight: 700;
            opacity: 1;
        }

        #sidebar ul li.active a i.menu-icon {
            background: var(--sidebar-bg);
            color: #fff;
            width: 26px; height: 26px;
            border-radius: 50%;
            box-shadow: 0 3px 8px rgba(42, 33, 133, 0.25);
            opacity: 1;
            font-size: 0.82rem;
            margin-left: -2px;
        }

        #sidebar ul li.active a::before {
            content: ""; position: absolute; right: 0; top: -25px; width: 25px; height: 25px;
            border-radius: 50%; box-shadow: 15px 15px 0 0 var(--sidebar-active-bg); pointer-events: none;
        }
        #sidebar ul li.active a::after {
            content: ""; position: absolute; right: 0; bottom: -25px; width: 25px; height: 25px;
            border-radius: 50%; box-shadow: 15px -15px 0 0 var(--sidebar-active-bg); pointer-events: none;
        }

        #sidebar .sidebar-footer {
            margin-top: auto;
            padding: 8px 10px 12px;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen flex flex-col md:flex-row antialiased relative selection:bg-slate-900 selection:text-white">

    <!-- Ambient Dynamic Glow Background Lighting (Sesuai Tema Terpilih) -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute -top-32 -right-32 w-72 h-72 rounded-full {{ $tema['glow1'] }} blur-3xl transition-all duration-700"></div>
        <div class="absolute top-1/2 -left-32 w-72 h-72 rounded-full {{ $tema['glow2'] }} blur-3xl transition-all duration-700"></div>
        <div class="absolute -bottom-32 right-1/3 w-72 h-72 rounded-full {{ $tema['glow3'] }} blur-3xl transition-all duration-700"></div>
    </div>

    <!-- Mobile Topbar Header (Warna Navy Sistem RT) -->
    <header class="md:hidden flex items-center justify-between px-3 py-2 bg-[#2a2185] text-white border-b-2 border-white sticky top-0 z-30 shadow-md relative">
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-lg overflow-hidden shrink-0 bg-white flex items-center justify-center p-0.5 border border-slate-200/80 shadow-sm">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <div>
                <span class="font-bold text-[11px] tracking-wider text-white block leading-tight">{{ $pengaturanSitus->nama_toko ?? 'IDS STORE' }}</span>
                <span class="text-[8px] text-blue-200 font-extrabold uppercase tracking-wider leading-none">Cockpit Admin</span>
            </div>
        </div>

        <!-- Mobile Racing Clock & Menu Button -->
        <div class="flex items-center gap-1.5">
            <div class="bg-white/10 text-white rounded-full px-3 py-1 flex items-center gap-1.5 font-racing text-[10px] border border-white/15 shadow-xs">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                <span class="racing-clock-hours-min text-white font-bold">{{ date('H:i') }}</span>
                <span class="text-amber-300 text-[8px] font-mono font-bold">WIB</span>
            </div>
            <button type="button" onclick="bukaTutupSidebar()" class="w-7 h-7 rounded-lg bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors border border-white/10">
                <i class="fa-solid fa-bars text-xs"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Backdrop Overlay -->
    <div id="sidebar-backdrop" onclick="bukaTutupSidebar()" class="fixed inset-0 bg-slate-950/60 z-30 hidden md:hidden backdrop-blur-xs transition-opacity"></div>

    <!-- =============== Sidebar (Sistem RT Style) =============== -->
    <nav id="sidebar" class="fixed inset-y-0 left-0 z-40 transform -translate-x-full md:translate-x-0 transition-transform duration-300 md:static md:h-screen md:sticky md:top-0">
        <!-- Sidebar Header (White Card seperti Sistem RT) -->
        <div class="sidebar-header">
            <div class="flex items-center gap-2 w-full">
                <div class="w-8 h-8 rounded-lg overflow-hidden shrink-0 bg-white flex items-center justify-center p-0.5 border border-slate-200/80 shadow-xs">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                <div class="logo-text min-w-0 flex-1">
                    <h1 class="brand-name truncate" style="font-size: 0.74rem; font-weight: 800; letter-spacing: -0.2px;">{{ $pengaturanSitus->nama_toko ?? 'IDS STORE' }}</h1>
                    <span class="brand-tagline font-extrabold block truncate" style="font-size: 0.58rem; letter-spacing: 0.8px;">PORTFOLIO COCKPIT</span>
                </div>
                <button type="button" onclick="bukaTutupSidebar()" class="md:hidden ml-auto text-slate-400 hover:text-slate-600 p-0.5">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </div>
        </div>

        <ul class="list-unstyled components mt-2">
            <li class="{{ request()->routeIs('admin.dasbor') ? 'active' : '' }}">
                <a href="{{ route('admin.dasbor') }}">
                    <i class="fas fa-home menu-icon"></i>
                    <span>Dasbor Utama</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.keahlian.*') ? 'active' : '' }}">
                <a href="{{ route('admin.keahlian.indeks') }}">
                    <i class="fas fa-microchip menu-icon"></i>
                    <span>Keahlian</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.projek.*') ? 'active' : '' }}">
                <a href="{{ route('admin.projek.indeks') }}">
                    <i class="fas fa-laptop-code menu-icon"></i>
                    <span>Kelola Projek</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <a href="{{ route('admin.produk.indeks') }}">
                    <i class="fas fa-store menu-icon"></i>
                    <span>Katalog Toko</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.pengaturan.*') ? 'active' : '' }}">
                <a href="{{ route('admin.pengaturan.indeks') }}">
                    <i class="fas fa-sliders-h menu-icon"></i>
                    <span>Pengaturan Situs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('beranda') }}" target="_blank">
                    <i class="fas fa-external-link-alt menu-icon"></i>
                    <span>Web Utama</span>
                    <span class="ml-auto px-1.5 py-0.5 rounded text-[8px] font-black uppercase bg-emerald-400 text-slate-900 shrink-0">Live</span>
                </a>
            </li>
        </ul>

        <!-- Sidebar Footer (Profile & Logout) -->
        <div class="sidebar-footer">
            <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <div class="mx-2 mb-1 p-1.5 rounded-xl bg-white/10 border border-white/15 flex items-center justify-between text-white">
                <div class="flex items-center gap-2 min-w-0">
                    <div class="w-6 h-6 rounded-md bg-white text-[#2a2185] flex items-center justify-center text-[10px] font-bold font-racing flex-shrink-0 shadow-sm">
                        {{ strtoupper(substr(auth()->user()->nama ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-[11px] font-bold text-white truncate leading-tight">{{ auth()->user()->nama ?? 'Admin IDS' }}</p>
                        <p class="text-[8px] text-blue-200/80 font-mono truncate leading-none">Super Administrator</p>
                    </div>
                </div>
                <button type="button" onclick="document.getElementById('sidebar-logout-form').submit();" class="w-6 h-6 rounded-md bg-white/10 hover:bg-rose-500 hover:text-white text-white border border-white/15 flex items-center justify-center transition-all cursor-pointer shadow-2xs active:scale-95" title="Keluar">
                    <i class="fas fa-sign-out-alt text-[10px]"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 min-h-screen bg-[#f1f5f9] relative z-10">
        
        <!-- TOPBAR HEADER DENGAN JAM & TANGGAL RACING -->
        <header class="bg-white border-b border-slate-200/90 shadow-2xs px-4 sm:px-6 py-2.5 flex items-center justify-between sticky top-0 z-30">
            
            <!-- Sisi Kiri: Judul Halaman & Subjudul -->
            <div class="flex items-center gap-2.5 min-w-0">
                <div class="w-1.5 h-6 rounded-full bg-[#2a2185] hidden sm:block flex-shrink-0"></div>
                <div class="min-w-0">
                    <h1 class="text-xs sm:text-sm font-extrabold text-slate-900 tracking-tight leading-tight truncate font-racing">
                        @yield('halaman_judul', 'Dasbor')
                    </h1>
                    <p class="text-[9.5px] sm:text-[10px] text-slate-500 font-medium leading-none mt-0.5 truncate hidden sm:block">
                        @yield('halaman_subjudul', 'Sistem Pengelola Portofolio IDS Store')
                    </p>
                </div>
            </div>

            <!-- Sisi Kanan: TELEMETRY CLOCK & DATE (Oval Capsule + RGB Border) -->
            <div class="flex items-center gap-2 sm:gap-2.5 flex-shrink-0">
                
                <!-- Telemetry Capsule Oval RGB Animated Border Presisi -->
                <div class="rgb-clock-capsule">
                    <div class="rgb-clock-inner">
                        
                        <!-- Slanted Accent Decal Stripes -->
                        <div class="flex items-center gap-[2.5px] transform -skew-x-[20deg] flex-shrink-0 pl-0.5">
                            <span class="w-[2.5px] h-3.5 bg-[#2a2185] rounded-full"></span>
                            <span class="w-[2.5px] h-3.5 bg-blue-600 rounded-full"></span>
                            <span class="w-[2.5px] h-3.5 bg-sky-400 rounded-full"></span>
                        </div>

                        <!-- Hari & Tanggal -->
                        <div class="hidden sm:flex items-center gap-1.5 border-r border-slate-200/90 pr-2.5">
                            <div class="w-6 h-6 rounded-full bg-slate-100 border border-slate-200/80 flex items-center justify-center text-[#2a2185] text-[10px] flex-shrink-0 shadow-2xs">
                                <i class="fa-regular fa-calendar-days"></i>
                            </div>
                            <div class="flex flex-col text-left">
                                <span class="racing-clock-day text-[8.5px] font-racing font-extrabold text-[#2a2185] uppercase tracking-wider leading-none">
                                    {{ strtoupper(\Carbon\Carbon::now()->locale('id')->isoFormat('dddd')) }}
                                </span>
                                <span class="racing-clock-date text-[10px] font-mono font-black text-slate-800 tracking-wider leading-tight mt-0.5 whitespace-nowrap">
                                    {{ strtoupper(\Carbon\Carbon::now()->locale('id')->isoFormat('D MMM Y')) }}
                                </span>
                            </div>
                        </div>

                        <!-- Jam Digital Racing (HH:MM : SS WIB) -->
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-amber-50 border border-amber-200/80 flex items-center justify-center text-amber-500 text-[10px] flex-shrink-0 shadow-2xs">
                                <i class="fa-regular fa-clock"></i>
                            </div>

                            <div class="flex items-baseline gap-0.5 font-racing font-black text-slate-900 text-xs sm:text-sm tracking-wider">
                                <span class="racing-clock-hours-min text-slate-900 font-extrabold">{{ date('H:i') }}</span>
                                <span class="text-rose-500 animate-pulse font-mono font-bold">:</span>
                                <span class="racing-clock-seconds font-mono text-[9.5px] font-black text-[#2a2185] bg-slate-100 border border-slate-200/90 px-1.5 py-0.5 rounded-full shadow-2xs">{{ date('s') }}</span>
                            </div>

                            <!-- Timezone Badge (Navy Elegan) -->
                            <div class="flex items-center gap-1 pl-0.5 pr-0.5">
                                <span class="px-2 py-0.5 rounded-full bg-[#2a2185] text-white text-[8px] font-racing font-extrabold tracking-widest shadow-2xs">
                                    WIB
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping" title="Sistem Aktif"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Body Content -->
        <div class="p-3.5 sm:p-5 lg:p-6 flex-1 w-full">
            <!-- Flash Message: Sukses -->
            @if(session('sukses'))
                <div class="mb-3 rounded-xl bg-white border border-emerald-200/90 shadow-2xs p-2 sm:p-2.5 text-emerald-800 text-[11.5px] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-md bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center flex-shrink-0 text-xs">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                        <span class="font-bold text-slate-800">{{ session('sukses') }}</span>
                    </div>
                    <button type="button" onclick="this.closest('.mb-3').remove()" class="text-slate-400 hover:text-slate-700 p-0.5">
                        <i class="fa-solid fa-xmark text-xs"></i>
                    </button>
                </div>
            @endif

            <!-- Flash Message: Error Validasi -->
            @if($errors->any())
                <div class="mb-3 rounded-xl bg-white border border-rose-200/90 shadow-2xs p-2.5 text-rose-800 text-[11.5px]">
                    <div class="flex items-center gap-1.5 mb-1 font-bold text-rose-700">
                        <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                        <span>Mohon periksa kesalahan pengisian berikut:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-0.5 text-[10.5px] text-slate-700 font-medium pl-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('konten')
        </div>

        <!-- Footer -->
        <footer class="px-4 py-2 border-t border-slate-200/80 text-center text-[10.5px] text-slate-500 bg-white/70 backdrop-blur-xs mt-auto">
            &copy; {{ date('Y') }} <strong class="text-slate-800 font-racing">{{ $pengaturanSitus->nama_toko ?? 'IDS Store Technology' }}</strong> — Portofolio <span class="text-slate-900 font-bold">{{ $pengaturanSitus->nama_lengkap ?? 'Nurhadi' }}</span>.
        </footer>
    </main>

    <script>
        function bukaTutupSidebar() {
            const sidebar = document.getElementById('sidebar') || document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            if (!sidebar || !backdrop) return;

            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            }
        }

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

    @stack('skrip')
</body>
</html>
