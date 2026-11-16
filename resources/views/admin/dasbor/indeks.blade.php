@extends('admin.tata_letak.utama')

@section('judul', 'Dasbor Utama')
@section('halaman_judul', 'Dasbor Ringkasan')
@section('halaman_subjudul', 'Ringkasan data portofolio, keahlian teknis, dan katalog produk IDS Store')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp

@section('konten')
<div class="space-y-3.5">

    <!-- Stat Metrik Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        
        <!-- Card 1: Keahlian & Kemampuan -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-xs p-3.5 flex flex-col justify-between transition-all duration-200 group">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-racing font-bold text-[#2a2185] uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Keahlian Teknis
                    </span>
                    <div class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-microchip"></i>
                    </div>
                </div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl font-extrabold text-slate-900 font-racing">{{ $totalKeahlian }}</span>
                    <span class="text-[9px] text-emerald-700 font-bold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200 font-mono">{{ $keahlianAktif }} Aktif</span>
                </div>
            </div>
            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('admin.keahlian.indeks') }}" class="text-slate-500 hover:text-slate-900 transition-colors flex items-center gap-1 text-[11px] font-bold">
                    <span>Kelola Keahlian</span>
                    <i class="fa-solid fa-arrow-right text-[8.5px]"></i>
                </a>
            </div>
        </div>

        <!-- Card 2: Projek Portofolio -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-xs p-3.5 flex flex-col justify-between transition-all duration-200 group">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-racing font-bold text-[#2a2185] uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Projek Portofolio
                    </span>
                    <div class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                </div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl font-extrabold text-slate-900 font-racing">{{ $totalProjek }}</span>
                    <span class="text-[9px] text-emerald-700 font-bold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200 font-mono">{{ $projekAktif }} Tayang</span>
                </div>
            </div>
            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('admin.projek.indeks') }}" class="text-slate-500 hover:text-slate-900 transition-colors flex items-center gap-1 text-[11px] font-bold">
                    <span>Kelola Projek</span>
                    <i class="fa-solid fa-arrow-right text-[8.5px]"></i>
                </a>
            </div>
        </div>

        <!-- Card 3: Katalog Produk IDS Store -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-xs p-3.5 flex flex-col justify-between transition-all duration-200 group">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-racing font-bold text-[#2a2185] uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Produk IDS Store
                    </span>
                    <div class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-store"></i>
                    </div>
                </div>
                <div class="flex items-baseline justify-between">
                    <span class="text-2xl font-extrabold text-slate-900 font-racing">{{ $totalProduk }}</span>
                    <span class="text-[9px] text-emerald-700 font-bold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200 font-mono">{{ $produkAktif }} Ready</span>
                </div>
            </div>
            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('admin.produk.indeks') }}" class="text-slate-500 hover:text-slate-900 transition-colors flex items-center gap-1 text-[11px] font-bold">
                    <span>Kelola Produk</span>
                    <i class="fa-solid fa-arrow-right text-[8.5px]"></i>
                </a>
            </div>
        </div>

        <!-- Card 4: WhatsApp & Kontak Toko -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-xs p-3.5 flex flex-col justify-between transition-all duration-200 group">
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-racing font-bold text-[#2a2185] uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        WhatsApp Resmi
                    </span>
                    <div class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs group-hover:scale-105 transition-transform">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-extrabold text-slate-900 font-mono truncate">+{{ $pengaturan->nomor_whatsapp ?? '6281234567890' }}</p>
                    <p class="text-[10px] text-slate-400 font-medium truncate mt-0.5">{{ $pengaturan->nama_toko ?? 'IDS STORE TECHNOLOGY' }}</p>
                </div>
            </div>
            <div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('admin.pengaturan.indeks') }}" class="text-slate-500 hover:text-slate-900 transition-colors flex items-center gap-1 text-[11px] font-bold">
                    <span>Ubah Kontak</span>
                    <i class="fa-solid fa-arrow-right text-[8.5px]"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- Quick Actions Banner -->
    <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs px-3.5 py-2.5 flex flex-col sm:flex-row items-center justify-between gap-2.5">
        <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-lg bg-slate-900 text-white flex items-center justify-center shadow-2xs">
                <i class="fa-solid fa-bolt text-amber-400 text-xs"></i>
            </div>
            <div>
                <h3 class="text-xs font-racing font-bold text-slate-900 tracking-wide uppercase">Pintasan Manajemen Cepat</h3>
                <p class="text-[10.5px] text-slate-400">Tambah data baru langsung ke portofolio dan katalog secara instan</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('admin.keahlian.buat') }}" class="flex-1 sm:flex-initial px-3 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all shadow-2xs hover:scale-105 active:scale-95">
                <i class="fa-solid fa-plus text-[9px]"></i>
                <span>+ Keahlian</span>
            </a>
            <a href="{{ route('admin.projek.buat') }}" class="flex-1 sm:flex-initial px-3 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all shadow-2xs hover:scale-105 active:scale-95">
                <i class="fa-solid fa-plus text-[9px]"></i>
                <span>+ Projek</span>
            </a>
            <a href="{{ route('admin.produk.buat') }}" class="flex-1 sm:flex-initial px-3 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider flex items-center justify-center gap-1.5 transition-all shadow-2xs hover:scale-105 active:scale-95">
                <i class="fa-solid fa-plus text-[9px]"></i>
                <span>+ Produk</span>
            </a>
        </div>
    </div>

    <!-- 2 Kolom Lebar: Projek Portofolio & Produk Toko Terkini -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3.5">

        <!-- Projek Portofolio Terakhir -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs overflow-hidden">
            <div class="px-3.5 py-2.5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-md bg-slate-100 border border-slate-200 text-[#2a2185] flex items-center justify-center text-[11px] shadow-2xs">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                    <div>
                        <h3 class="font-racing font-bold text-xs text-slate-900 uppercase tracking-wider">Projek Portofolio Terakhir</h3>
                    </div>
                </div>
                <a href="{{ route('admin.projek.indeks') }}" class="text-[11px] text-[#2a2185] hover:underline font-bold flex items-center gap-1">
                    <span>Semua Projek</span>
                    <i class="fa-solid fa-chevron-right text-[8px]"></i>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($projekTerbaru as $prj)
                    <div class="p-2.5 sm:p-3 flex items-center justify-between gap-2.5 hover:bg-slate-50/80 transition-colors">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0 p-0.5">
                                @if($prj->gambar_desain)
                                    <img src="{{ asset($prj->gambar_desain) }}" alt="" class="w-full h-full object-contain">
                                @else
                                    <i class="fa-solid fa-microchip text-slate-400 text-xs"></i>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-xs font-bold text-slate-900 truncate">{{ $prj->judul }}</h4>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="text-[9.5px] font-racing font-bold uppercase text-slate-500">{{ $prj->kategori }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-[9px] font-mono text-[#2a2185] font-bold truncate">{{ $prj->lencana_kategori }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 flex-shrink-0">
                            <span class="text-[9px] px-2 py-0.5 rounded-full font-bold {{ $prj->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                {{ $prj->status_aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                            <a href="{{ route('admin.projek.ubah', $prj) }}" class="w-7 h-7 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-all shadow-2xs" title="Ubah Projek">
                                <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-xs text-slate-400">Belum ada data projek portofolio.</div>
                @endforelse
            </div>
        </div>

        <!-- Produk IDS Store Terakhir -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs overflow-hidden">
            <div class="px-3.5 py-2.5 bg-slate-50/70 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-md bg-slate-100 border border-slate-200 text-[#2a2185] flex items-center justify-center text-[11px] shadow-2xs">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div>
                        <h3 class="font-racing font-bold text-xs text-slate-900 uppercase tracking-wider">Katalog Produk Terakhir</h3>
                    </div>
                </div>
                <a href="{{ route('admin.produk.indeks') }}" class="text-[11px] text-[#2a2185] hover:underline font-bold flex items-center gap-1">
                    <span>Semua Produk</span>
                    <i class="fa-solid fa-chevron-right text-[8px]"></i>
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($produkTerbaru as $prd)
                    <div class="p-2.5 sm:p-3 flex items-center justify-between gap-2.5 hover:bg-slate-50/80 transition-colors">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0 p-0.5">
                                @if($prd->gambar)
                                    <img src="{{ asset($prd->gambar) }}" alt="" class="w-full h-full object-contain">
                                @else
                                    <i class="fa-solid fa-bolt text-slate-400 text-xs"></i>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-xs font-bold text-slate-900 truncate">{{ $prd->nama_produk }}</h4>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="text-[11px] font-racing font-bold text-[#2a2185]">{{ $prd->harga_format }}</span>
                                    <span class="text-slate-300">•</span>
                                    <span class="text-[9px] font-mono text-slate-400">{{ $prd->kode_produk }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 flex-shrink-0">
                            <span class="text-[9px] px-2 py-0.5 rounded-full font-bold {{ $prd->status_stok === 'Ready' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                                {{ $prd->status_stok }}
                            </span>
                            <a href="{{ route('admin.produk.ubah', $prd) }}" class="w-7 h-7 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-all shadow-2xs" title="Ubah Produk">
                                <i class="fa-solid fa-pen-to-square text-[11px]"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-xs text-slate-400">Belum ada katalog produk toko.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
