<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio resmi Nurhadi - Web Developer & Founder IDS Store Technology. Portofolio proyek teknologi, pengembangan sistem, dan keahlian rekayasa perangkat lunak.">
    <meta name="author" content="Nurhadi">
    <meta property="og:title" content="Portfolio - Nurhadi | IDS Store Technology">
    <meta property="og:description" content="Portfolio resmi Nurhadi - Web Developer & Founder IDS Store Technology.">
    <meta property="og:url" content="https://nurhadi.cloud">
    <meta property="og:type" content="website">
    <title>Portfolio - Nurhadi | IDS Store Technology</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    
    <!-- Performance Preconnect & DNS Prefetch -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://cdn.tailwindcss.com">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Orbitron:wght@600;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-racing { font-family: 'Orbitron', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 antialiased">

    <!-- 1. Topbar Navigation -->
    @include('layout.topbar')

    <!-- Main Content Container -->
    <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-20 text-center">
        
        <!-- 2. Hero & Profile Section -->
        @include('sections.hero')

        <!-- 3. Skills & Competencies Slider Section -->
        @include('sections.skills')

        <!-- 4. Projects & Portfolio Section -->
        @include('sections.projects')

        <!-- 5. IDS Store Showcase & Product Catalog Section -->
        @include('sections.store')

        <!-- 6. Fullscreen Image Modal / Lightbox -->
        @include('sections.modal-lightbox')

        <!-- Footer -->
        <footer class="mt-16 pt-8 border-t border-slate-200 text-center text-xs text-slate-500">
            <p>&copy; {{ date('Y') }} <strong class="text-slate-800">{{ $pengaturan->nama_toko ?? 'IDS Store Technology' }}</strong> • {{ $pengaturan->nama_lengkap ?? 'Nurhadi' }}. Seluruh hak cipta dilindungi.
                <a href="{{ route('login') }}" class="opacity-0 hover:opacity-40 text-slate-400 text-[10px] transition-opacity cursor-pointer inline-block px-1" title="Panel">&#8226;</a>
            </p>
        </footer>

    </main>

    <!-- 7. Javascript Controllers & Interaction Scripts -->
    @include('sections.scripts')

</body>
</html>