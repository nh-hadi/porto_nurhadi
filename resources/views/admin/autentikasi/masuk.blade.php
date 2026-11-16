@php
    $pengaturanSitus = \App\Models\PengaturanSitus::ambilData();
    $temaAktif = $pengaturanSitus->temaTokens();
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Panel Admin — {{ $pengaturanSitus->nama_toko ?? 'IDS Store Technology' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Fonts & Font Awesome Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Orbitron:wght@600;800;900&display=swap" rel="stylesheet">
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
    </style>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen flex items-center justify-center p-3 sm:p-4 relative overflow-hidden antialiased select-none">

    <!-- Ambient Subtle Glow Circles -->
    <div class="absolute -top-32 -left-32 w-80 h-80 {{ $temaAktif['glow1'] }} rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-80 h-80 {{ $temaAktif['glow2'] }} rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 right-1/4 w-72 h-72 {{ $temaAktif['glow3'] }} rounded-full blur-3xl pointer-events-none"></div>

    <!-- Login Container Card with Main-Page Animated Multi-Color Gradient Border -->
    <div class="relative w-full max-w-sm rounded-2xl p-[1.5px] bg-gradient-to-r {{ $temaAktif['border'] }} bg-[length:300%_100%] animate-gradient shadow-xl z-10">
        
        <div class="bg-white rounded-[14px] p-5 sm:p-6">
            
            <!-- Logo & Brand Header -->
            <div class="text-center mb-4">
                <div class="inline-block relative mb-2.5 group">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $temaAktif['gradient'] }} p-[1.5px] shadow-sm flex items-center justify-center mx-auto transform group-hover:scale-105 group-hover:rotate-2 transition-all">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo IDS Store" class="w-full h-full object-contain rounded-[9px] bg-white p-0.5">
                    </div>
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 whitespace-nowrap bg-gradient-to-r {{ $temaAktif['btn'] }} text-white text-[8px] font-racing font-bold px-2 py-0.2 rounded-full shadow-2xs border border-white">
                        ADMIN
                    </span>
                </div>

                <h1 class="text-base sm:text-lg font-extrabold text-slate-900 tracking-tight font-racing">
                    PANEL KONTROL
                </h1>
                <p class="text-[11px] text-slate-500 mt-0.5 font-medium">
                    IDS Store Technology • Nurhadi
                </p>
            </div>

            <!-- Alert Notification -->
            @if(session('sukses'))
                <div class="mb-3 p-2 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-check text-emerald-600"></i>
                    <span class="font-medium">{{ session('sukses') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-3 p-2 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 text-[11px] flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-exclamation text-rose-600"></i>
                    <span class="font-medium">{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- Form Masuk -->
            <form action="{{ route('login.proses') }}" method="POST" class="space-y-3">
                @csrf

                <!-- Input Email -->
                <div>
                    <label for="email" class="block text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 font-racing">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@idsstore.com') }}" required autofocus placeholder="admin@idsstore.com" class="w-full pl-9 pr-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white {{ $temaAktif['focus'] }} text-slate-800 text-xs transition-all outline-hidden font-medium">
                    </div>
                </div>

                <!-- Input Kata Sandi -->
                <div>
                    <label for="password" class="block text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 font-racing">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <input type="password" id="password" name="password" required placeholder="••••••••" value="admin123" class="w-full pl-9 pr-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white {{ $temaAktif['focus'] }} text-slate-800 text-xs transition-all outline-hidden">
                    </div>
                </div>

                <!-- Checkbox Ingat Saya -->
                <div class="flex items-center justify-between text-[11px] pt-0.5">
                    <label class="flex items-center gap-1.5 cursor-pointer text-slate-600 hover:text-slate-800 font-medium select-none">
                        <input type="checkbox" name="ingat_saya" value="1" checked class="rounded border-slate-300 {{ $temaAktif['icon'] }} {{ $temaAktif['focus'] }} h-3.5 w-3.5">
                        <span>Ingat Saya di Perangkat Ini</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-2 px-3 rounded-lg bg-gradient-to-r {{ $temaAktif['btn'] }} text-white font-racing font-bold text-xs uppercase tracking-wider shadow-xs hover:scale-[1.01] active:scale-95 transition-all flex items-center justify-center gap-1.5 cursor-pointer mt-1">
                    <i class="fa-solid fa-right-to-bracket text-xs"></i>
                    <span>Masuk ke Panel Admin</span>
                </button>
            </form>

            <!-- Default Credentials Hint -->
            <div class="mt-4 pt-3 border-t border-slate-100 text-center space-y-2">
                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-[9.5px] text-slate-600 font-mono">
                    <i class="fa-solid fa-key text-amber-500"></i>
                    <span>Default: <strong class="text-slate-800">admin@idsstore.com</strong> / <strong class="text-slate-800">admin123</strong></span>
                </div>
                <div>
                    <a href="{{ route('beranda') }}" class="text-[11px] text-slate-500 hover:text-slate-900 transition-colors inline-flex items-center gap-1 font-bold">
                        <i class="fa-solid fa-arrow-left text-[9px] text-rose-500"></i>
                        <span>Kembali ke Website Utama</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</body>
</html>
