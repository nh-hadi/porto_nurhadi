@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp
<!-- ========================================== -->
<!-- IDS STORE SHOWCASE / KATALOG PRODUK (#store) -->
<!-- ========================================== -->
<section id="store" class="mt-12 sm:mt-14 w-full text-left">
    <!-- Header Simpel & Navigasi Filter -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-4 px-1 gap-3">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="w-2 h-2 rounded-full {{ $temaAktif['ping'] }} animate-pulse"></span>
                <span class="font-racing font-bold text-[11px] uppercase tracking-wider bg-gradient-to-r {{ $temaAktif['text_gradient'] }} bg-clip-text text-transparent">
                    {{ $pengaturan->nama_toko ?? 'IDS STORE TECHNOLOGY' }} • OFFICIAL HARDWARE
                </span>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                    Katalog Produk & Hardware
                </h2>
                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                    Ready Stock & Custom
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-0.5 font-medium">
                Modul elektronik presisi, dev-kit IoT, dan perakitan hardware teruji siap pakai dengan dukungan teknis.
            </p>
        </div>

        <!-- Controls: Category Filters & Slide Navigation Buttons -->
        <div class="flex items-center justify-between sm:justify-end gap-2 w-full sm:w-auto">
            <!-- Minimalist Filter Pills -->
            <div class="flex items-center gap-1 overflow-x-auto pb-0.5 no-scrollbar text-xs font-semibold">
                <button type="button" onclick="filterStoreCategory('all')" id="filter-store-all" class="store-filter-btn px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Semua <span class="text-[9px] opacity-75 font-normal ml-0.5">({{ $daftarProduk->count() }})</span>
                </button>
                <button type="button" onclick="filterStoreCategory('psu')" id="filter-store-psu" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Power & PSU <span class="text-[9px] opacity-75 font-normal ml-0.5">({{ $daftarProduk->where('kategori', 'psu')->count() }})</span>
                </button>
                <button type="button" onclick="filterStoreCategory('iot')" id="filter-store-iot" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    IoT Board <span class="text-[9px] opacity-75 font-normal ml-0.5">({{ $daftarProduk->where('kategori', 'iot')->count() }})</span>
                </button>
                <button type="button" onclick="filterStoreCategory('custom')" id="filter-store-custom" class="store-filter-btn px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 text-[11px] whitespace-nowrap transition-all cursor-pointer">
                    Jasa Custom <span class="text-[9px] opacity-75 font-normal ml-0.5">({{ $daftarProduk->where('kategori', 'custom')->count() }})</span>
                </button>
            </div>

            <!-- Slide Arrows for Horizontal Navigation -->
            <div class="flex items-center gap-1 flex-shrink-0">
                <button type="button" onclick="scrollStore('left')" class="w-7 h-7 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer" title="Geser Kiri" aria-label="Geser Kiri">
                    <i class="fa-solid fa-chevron-left text-[10px]"></i>
                </button>
                <button type="button" onclick="scrollStore('right')" class="w-7 h-7 rounded-lg bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 hover:text-white text-slate-700 transition-all flex items-center justify-center shadow-xs active:scale-95 cursor-pointer" title="Geser Kanan" aria-label="Geser Kanan">
                    <i class="fa-solid fa-chevron-right text-[10px]"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- 
      Product Cards Container:
      - Mobile: 2 Rows x 2 Columns visible, smooth horizontal swipe
      - Tablet/Desktop: Clean 3-4 Columns Responsive Grid
    -->
    <div id="store-products-grid" class="-mx-3 px-3 sm:mx-0 sm:px-0 grid grid-rows-2 grid-flow-col auto-cols-[calc(50%-5px)] xs:auto-cols-[calc(50%-6px)] sm:auto-cols-auto sm:grid-rows-none sm:grid-flow-row sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-3 sm:gap-4 overflow-x-auto pb-2 pt-0.5 snap-x snap-mandatory scroll-smooth no-scrollbar select-none" style="scrollbar-width: none; -ms-overflow-style: none; -webkit-overflow-scrolling: touch;">
        
        @forelse($daftarProduk as $produk)
            <div class="store-product-item snap-start group bg-white rounded-2xl border border-slate-200/90 shadow-xs hover:shadow-xl hover:border-slate-300 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden" data-category="{{ $produk->kategori }}">
                <div>
                    <!-- Media Header with Ambient Glow & Floating Quick Actions -->
                    <div class="relative w-full h-32 xs:h-36 sm:h-40 bg-slate-950 p-2.5 overflow-hidden flex items-center justify-center border-b border-slate-100 group/img cursor-pointer" onclick="openProductModal('{{ $produk->kode_produk }}')">
                        <!-- Ambient Glow Effects -->
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-rose-500/25 rounded-full blur-xl pointer-events-none"></div>
                        <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-cyan-500/25 rounded-full blur-xl pointer-events-none"></div>
                        
                        <!-- Product Image -->
                        @if($produk->gambar)
                            <img src="{{ asset($produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="max-h-full max-w-full object-contain group-hover:scale-105 transition-transform duration-500 z-1">
                        @else
                            <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 z-1">
                                <i class="fa-solid fa-microchip text-lg"></i>
                            </div>
                        @endif
                        
                        <!-- Top Left Category & Stock Badge -->
                        <div class="absolute top-2 left-2 z-10 flex items-center gap-1">
                            <span class="px-1.5 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-slate-800 text-[8px] sm:text-[8.5px] font-racing font-bold shadow-xs">
                                {{ $produk->lencana_kategori }}
                            </span>
                            <span class="px-1.5 py-0.5 rounded-md text-[8px] font-bold shadow-xs {{ $produk->status_stok === 'Ready' ? 'bg-emerald-500/90 text-white' : 'bg-amber-500/90 text-white' }}">
                                {{ $produk->status_stok }}
                            </span>
                        </div>

                        <!-- Bottom Chip Tag -->
                        @if($produk->tag_chip)
                            <div class="absolute bottom-1.5 right-2 text-[8px] sm:text-[9px] font-mono text-slate-400 z-10 bg-slate-900/80 px-1.5 py-0.5 rounded border border-slate-800">
                                {{ $produk->tag_chip }}
                            </div>
                        @endif
                    </div>

                    <!-- Content Body -->
                    <div class="p-2.5 sm:p-3.5">
                        <div class="flex items-center justify-between">
                            <span class="text-[8.5px] sm:text-[9.5px] font-bold text-rose-600 uppercase tracking-wider">{{ $produk->sub_kategori ?? 'IDS Store' }}</span>
                            <span class="text-[8.5px] font-mono text-slate-400">{{ $produk->kode_produk }}</span>
                        </div>
                        
                        <h3 class="font-extrabold text-slate-900 text-xs sm:text-sm mt-0.5 group-hover:text-rose-600 transition-colors line-clamp-1">
                            {{ $produk->nama_produk }}
                        </h3>
                        
                        <!-- Structured Micro-Specs Chips (Up to 3 items) -->
                        @if(!empty($produk->spesifikasi_teknis) && is_array($produk->spesifikasi_teknis))
                            <div class="mt-2 space-y-1 text-[9px] sm:text-[9.5px]">
                                @foreach(array_slice($produk->spesifikasi_teknis, 0, 3) as $spek)
                                    <div class="p-1 sm:p-1.5 rounded-lg bg-slate-50 border border-slate-100 flex items-center gap-1.5">
                                        <i class="{{ $spek['ikon'] ?? 'fa-solid fa-bolt' }} {{ $spek['warna'] ?? 'text-amber-500' }} text-[8.5px] sm:text-[9px] w-3 text-center flex-shrink-0"></i>
                                        <span class="text-slate-700 font-medium truncate">{{ $spek['nilai'] ?? ($spek['label'] ?? '') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Bottom Price & Single View & WA CTA Buttons -->
                <div class="p-2.5 sm:p-3.5 pt-2 sm:pt-2.5 border-t border-slate-100 flex items-center justify-between gap-1.5 bg-slate-50/70">
                    <div class="min-w-0">
                        <span class="text-[7.5px] sm:text-[8px] text-slate-400 font-bold uppercase block leading-none">Harga</span>
                        <span class="font-racing font-extrabold text-xs sm:text-sm text-slate-900 truncate block mt-0.5">{{ $produk->harga_format }}</span>
                    </div>
                    <div class="flex items-center gap-1.5 flex-shrink-0">
                        <!-- 1 Tombol Lihat Saja -->
                        <button type="button" onclick="openProductModal('{{ $produk->kode_produk }}')" class="px-2.5 py-1.5 rounded-xl bg-white border border-slate-200 hover:border-slate-900 hover:bg-slate-900 text-slate-700 hover:text-white text-[9px] sm:text-[10px] font-bold transition-all flex items-center gap-1 shadow-2xs active:scale-95 cursor-pointer" title="Lihat Spesifikasi Lengkap">
                            <i class="fa-solid fa-eye text-[9.5px]"></i>
                            <span>LIHAT</span>
                        </button>
                        <!-- Tombol Beli WA -->
                        <a href="https://wa.me/{{ $pengaturan->nomor_whatsapp ?? '6281234567890' }}?text={{ urlencode($produk->teks_pesan_wa ?? ('Halo IDS Store, saya tertarik order ' . $produk->nama_produk)) }}" target="_blank" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-rose-600 text-white font-racing font-bold text-[8.5px] sm:text-[9.5px] tracking-wider transition-all flex items-center gap-1 shadow-2xs active:scale-95">
                            <i class="fa-brands fa-whatsapp text-[10px] text-emerald-400"></i>
                            <span>BELI</span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center text-slate-400 text-xs bg-white rounded-2xl border border-slate-200">
                Belum ada produk toko yang terdaftar.
            </div>
        @endforelse

    </div>

    <!-- Swipe Hint on Mobile (Hidden on Desktop) -->
    <div class="sm:hidden flex items-center justify-between text-[10.5px] text-slate-400 font-medium px-1 mt-1 mb-2">
        <span class="flex items-center gap-1 text-slate-500">
            <i class="fa-solid fa-arrows-left-right text-[10px] text-amber-500 animate-pulse"></i>
            <span>Geser horizontal untuk produk lainnya</span>
        </span>
        <span class="text-[9.5px] font-racing text-slate-400 font-bold">2x2 GRID</span>
    </div>

    <!-- Simple Trust Micro-Grid (3 Columns) -->
    <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-2 text-left">
        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-circle-check text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">100% QC Tested</h4>
                <p class="text-[9.5px] text-slate-500 truncate">Uji osiloskop & beban nyata sebelum kirim</p>
            </div>
        </div>

        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-cyan-50 text-cyan-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-file-code text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">Skematik & Source Code</h4>
                <p class="text-[9.5px] text-slate-500 truncate">File skematik & pustaka kode disertakan</p>
            </div>
        </div>

        <div class="p-2.5 sm:p-3 rounded-xl bg-white border border-slate-200/80 shadow-2xs flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-xs flex-shrink-0">
                <i class="fa-solid fa-headset text-sm"></i>
            </div>
            <div class="min-w-0">
                <h4 class="text-[11px] font-bold text-slate-900 leading-tight">Garansi & Support</h4>
                <p class="text-[9.5px] text-slate-500 truncate">Konsultasi teknis & instalasi siap bantu</p>
            </div>
        </div>
    </div>
</section>
