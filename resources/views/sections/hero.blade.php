@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
    $heroGlowGradient = $temaAktif['gradient'];
    $heroBadgeGradient = $temaAktif['btn'];
    $heroNameGradient = $temaAktif['text_gradient'];
    $heroBtnGradient = $temaAktif['btn'] . ' ' . $temaAktif['btn_shadow'];
@endphp
<!-- ========================================== -->
<!-- HERO & PROFILE SHOWCASE SECTION -->
<!-- ========================================== -->
<!-- Logo Showcase -->
<div class="relative inline-block mb-6 group">
    <!-- Animated Gradient Glow Behind Logo -->
    <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r {{ $heroGlowGradient }} opacity-75 blur-md group-hover:opacity-100 group-hover:blur-lg transition-all duration-500"></div>
    
    <!-- Logo Container Card -->
    <div class="relative w-28 h-28 sm:w-32 sm:h-32 rounded-2xl bg-white p-3 shadow-xl border border-white/80 flex items-center justify-center transform group-hover:scale-105 transition-all duration-300">
        <img src="{{ asset('img/logo.png') }}" alt="Logo IDS Store Technology" class="w-full h-full object-contain">
    </div>

    <!-- Official Store Floating Badge -->
    <div id="secret-admin-trigger" class="absolute -bottom-2.5 left-1/2 transform -translate-x-1/2 whitespace-nowrap bg-gradient-to-r {{ $heroBadgeGradient }} text-white text-[10px] font-racing font-bold px-3 py-0.5 rounded-full shadow-md border border-white cursor-pointer select-none" title="Official Store">
        <i class="fa-solid fa-circle-check text-[9px] mr-1"></i> OFFICIAL STORE
    </div>
</div>

<!-- Store Subheading Tag -->
<div class="flex items-center justify-center gap-2 mb-3 mt-1">
    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100/80 border border-amber-300 text-amber-800 font-bold text-xs tracking-wider uppercase">
        <i class="fa-solid fa-store text-amber-600 text-[10px]"></i>
        <span>{{ $pengaturan->nama_toko ?? 'IDS STORE TECHNOLOGY' }}</span>
    </span>
</div>

<!-- Main Introduction -->
<h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight mb-4 select-none">
    Halo, Saya 
    <span class="inline-flex tracking-normal font-racing">
        @foreach($pengaturan->namaPerHuruf('hero') as $itemHuruf)
            @if($itemHuruf['char'] === '&nbsp;')
                <span class="inline-block w-2 sm:w-3"></span>
            @else
                <span class="inline-block transition-transform duration-200 hover:-translate-y-1 hover:scale-110 {{ $itemHuruf['color'] }}">
                    {{ $itemHuruf['char'] }}
                </span>
            @endif
        @endforeach
    </span>
</h1>

<!-- Description -->
<p class="text-slate-600 text-base sm:text-lg max-w-3xl mx-auto mb-8 font-medium leading-relaxed">
    {{ $pengaturan->deskripsi_profil ?? 'Pengembang IoT, Hardware, Laravel & Flutter sekaligus official store resmi IDS STORE TECHNOLOGY.' }}
</p>

<!-- CTA Action Buttons -->
<div class="flex flex-wrap items-center justify-center gap-3.5">
    <a href="{{ $pengaturan->tautan_toko ?? '#store' }}" class="px-6 py-3 rounded-xl bg-gradient-to-r {{ $heroBtnGradient }} text-white font-racing font-bold text-xs uppercase tracking-wider shadow-lg hover:scale-105 transition-all flex items-center gap-2">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Kunjungi Toko IDS</span>
    </a>
    <a href="#projects" class="px-6 py-3 rounded-xl bg-white border border-slate-300 hover:border-slate-400 text-slate-700 hover:text-slate-900 font-bold text-xs uppercase tracking-wider shadow-sm hover:bg-slate-50 transition-all flex items-center gap-2">
        <i class="fa-solid fa-laptop-code text-slate-500"></i>
        <span>Portofolio & Proyek</span>
    </a>
    <a href="https://wa.me/{{ $pengaturan->nomor_whatsapp ?? '6281234567890' }}" target="_blank" class="px-6 py-3 rounded-xl bg-slate-900 text-white font-bold text-xs uppercase tracking-wider shadow-md hover:bg-slate-800 hover:scale-105 transition-all flex items-center gap-2">
        <i class="fa-solid fa-envelope text-amber-400"></i>
        <span>Hubungi Saya</span>
    </a>
</div>
