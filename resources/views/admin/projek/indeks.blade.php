@extends('admin.tata_letak.utama')

@section('judul', 'Kelola Projek Portofolio')
@section('halaman_judul', 'Daftar Projek Portofolio')
@section('halaman_subjudul', 'Kelola showcase projek desain hardware, PCB, IoT, dan aplikasi web/mobile')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
    $kategoriList = $daftarProjek->pluck('kategori')->unique()->filter()->values();
@endphp

@section('konten')
<div class="space-y-3.5 w-full">

    <!-- Header & Action Button (Clean Card) -->
    <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs px-4 py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <div class="flex items-center gap-1.5 mb-0.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span class="font-racing font-bold text-[10px] uppercase tracking-widest text-[#2a2185]">
                    PORTOFOLIO & KARYA
                </span>
            </div>
            <h2 class="text-sm sm:text-base font-extrabold text-slate-900 tracking-tight font-racing">Daftar Projek & Desain Hardware</h2>
            <p class="text-[11px] text-slate-500">Tersinkron dengan tampilan halaman utama: <span class="text-slate-900 font-bold font-mono">{{ $daftarProjek->count() }} projek</span></p>
        </div>

        <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap">
            <!-- View Mode Switcher -->
            <div class="bg-slate-100 border border-slate-200/90 rounded-lg p-0.5 flex items-center gap-0.5 shadow-2xs text-[11px] font-bold">
                <button type="button" onclick="setMode('kartu')" id="btn-mode-kartu" class="px-2.5 py-1 rounded-md bg-slate-900 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs">
                    <i class="fa-solid fa-layer-group text-[10px] text-cyan-400"></i>
                    <span>Mode Kartu</span>
                </button>
                <button type="button" onclick="setMode('tabel')" id="btn-mode-tabel" class="px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1 cursor-pointer">
                    <i class="fa-solid fa-table-list text-[10px]"></i>
                    <span>Tabel</span>
                </button>
            </div>

            <!-- Tambah Projek Button -->
            <a href="{{ route('admin.projek.buat') }}" class="px-3.5 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider shadow-2xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
                <i class="fa-solid fa-plus text-[9px]"></i>
                <span>+ Projek Baru</span>
            </a>
        </div>
    </div>

    <!-- Mode 1: Tampilan Showcase Kartu (Sama Persis Seperti Halaman Utama) -->
    <div id="view-mode-kartu" class="space-y-3.5">
        
        <!-- Filter Kategori Khas Halaman Utama -->
        <div class="flex flex-wrap items-center justify-between gap-2 px-1">
            <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                <button type="button" onclick="filterKategori('all', this)" class="btn-filter-kat px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs cursor-pointer text-[10.5px] transition-colors">Semua Projek</button>
                @foreach($kategoriList as $kat)
                    <button type="button" onclick="filterKategori('{{ $kat }}', this)" class="btn-filter-kat px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 transition-colors cursor-pointer text-[10.5px]">{{ $kat }}</button>
                @endforeach
            </div>

            <div class="text-[10.5px] text-slate-500 font-medium">
                Menampilkan <span id="admin-prj-count" class="font-bold text-slate-900 font-mono">{{ $daftarProjek->count() }}</span> projek
            </div>
        </div>

        <!-- Daftar Kartu Showcase Projek -->
        <div class="space-y-3.5">
            @forelse($daftarProjek as $index => $projek)
                <div class="admin-project-card bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:border-slate-300 transition-all duration-300 overflow-hidden" data-kategori="{{ $projek->kategori }}">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                            
                            <!-- Kolom Kiri: Media Showcase (Sama Persis Halaman Utama) -->
                            <div class="lg:col-span-6 bg-slate-950 p-3.5 sm:p-4 flex flex-col justify-between relative overflow-hidden">
                                <!-- Ambient Lighting Glows -->
                                <div class="absolute -top-12 -left-12 w-48 h-48 bg-cyan-600/20 rounded-full blur-3xl pointer-events-none"></div>
                                <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-rose-600/20 rounded-full blur-3xl pointer-events-none"></div>

                                <!-- Top Bar inside Media Box with Mode Switcher -->
                                <div class="relative z-10 flex flex-wrap items-center justify-between mb-2 gap-2">
                                    <div class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $projek->status_aktif ? 'bg-emerald-400 animate-pulse' : 'bg-rose-400' }}"></span>
                                        <span class="font-racing text-[10px] font-bold text-slate-200 uppercase tracking-wider truncate max-w-[170px] sm:max-w-xs">{{ $projek->judul }}</span>
                                    </div>

                                    @if($projek->gambar_desain && $projek->gambar_aplikasi)
                                        <div class="flex items-center bg-slate-900 border border-slate-800 p-0.5 rounded-lg text-[9px] font-bold">
                                            <button type="button" onclick="gantiMediaAdmin({{ $index }}, 'desain', '{{ asset($projek->gambar_desain) }}')" id="tab-admin-prj-{{ $index }}-desain" class="px-2 py-0.5 rounded-md bg-gradient-to-r from-purple-600 to-rose-600 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs">
                                                <i class="fa-solid fa-microchip text-[9px]"></i>
                                                <span>Desain Layout</span>
                                            </button>
                                            <button type="button" onclick="gantiMediaAdmin({{ $index }}, 'app', '{{ asset($projek->gambar_aplikasi) }}')" id="tab-admin-prj-{{ $index }}-app" class="px-2 py-0.5 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1 cursor-pointer">
                                                <i class="fa-solid fa-desktop text-[9px]"></i>
                                                <span>Tampilan App</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <!-- Main Image Preview with Interactive Lightbox Zoom Trigger -->
                                <div class="relative z-10 my-auto rounded-lg overflow-hidden border border-slate-800 bg-slate-900 shadow-xl group/img cursor-pointer" onclick="bukaModalZoomAdmin('{{ asset($projek->gambar_desain ?? $projek->gambar_aplikasi ?? 'img/logo.png') }}', '{{ addslashes($projek->judul) }}')">
                                    <img id="admin-prj-img-{{ $index }}" src="{{ asset($projek->gambar_desain ?? $projek->gambar_aplikasi ?? 'img/logo.png') }}" alt="{{ $projek->judul }}" class="w-full h-auto max-h-[190px] sm:max-h-[220px] object-contain transform group-hover/img:scale-102 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-slate-950/40 opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-1.5 text-white text-[10.5px] font-bold backdrop-blur-[2px]">
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

                            <!-- Kolom Kanan: Rincian Lengkap, Sorotan Teknis & Quick Action Admin -->
                            <div class="lg:col-span-6 p-3.5 sm:p-4 flex flex-col justify-between bg-white">
                                <div>
                                    <!-- Header Badges & Urutan -->
                                    <div class="flex flex-wrap items-center justify-between gap-1.5 mb-1.5">
                                        <div class="flex flex-wrap items-center gap-1.5">
                                            <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-[9px] font-racing font-bold">
                                                {{ $projek->lencana_kategori }}
                                            </span>
                                            @if($projek->subjudul_lencana)
                                                <span class="px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200 text-[9px] font-bold">
                                                    {{ $projek->subjudul_lencana }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex items-center gap-1.5">
                                            <!-- Urutan Badge -->
                                            <span class="px-2 py-0.5 rounded-md bg-slate-100 border border-slate-200 text-[9px] font-mono font-bold text-slate-600">
                                                Urutan #{{ $projek->urutan }}
                                            </span>

                                            <!-- Toggle Status Button -->
                                            <form action="{{ route('admin.projek.status', $projek) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="px-2 py-0.5 rounded-full text-[9px] font-bold transition-all cursor-pointer {{ $projek->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100' }}" title="Klik untuk ubah status tayang">
                                                    {{ $projek->status_aktif ? 'Aktif Tayang' : 'Nonaktif' }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Judul Projek -->
                                    <h3 class="text-sm sm:text-base font-extrabold text-slate-900 group-hover:text-rose-600 transition-colors font-racing">
                                        {{ $projek->judul }}
                                    </h3>

                                    <!-- Deskripsi -->
                                    <p class="text-[11px] text-slate-600 mt-1 leading-snug font-medium line-clamp-3">
                                        {{ $projek->deskripsi }}
                                    </p>

                                    <!-- 4-Panel Technical Highlights Grid (Sama Persis Halaman Utama) -->
                                    @if(!empty($projek->sorotan_teknis) && is_array($projek->sorotan_teknis))
                                        <div class="mt-2.5 grid grid-cols-2 gap-1.5 text-left">
                                            @foreach($projek->sorotan_teknis as $spek)
                                                <div class="p-2 rounded-lg bg-slate-50 border border-slate-100 flex items-start gap-1.5">
                                                    <div class="w-5 h-5 rounded-md bg-white border border-slate-200/80 {{ $spek['warna'] ?? 'text-rose-500' }} flex items-center justify-center text-[9px] flex-shrink-0 shadow-2xs mt-0.5">
                                                        <i class="{{ $spek['ikon'] ?? 'fa-solid fa-microchip' }}"></i>
                                                    </div>
                                                    <div class="min-w-0">
                                                        <span class="text-[9.5px] font-bold text-slate-800 block uppercase leading-none truncate">{{ $spek['judul'] ?? 'Fitur' }}</span>
                                                        <p class="text-[9.5px] text-slate-500 font-medium leading-tight mt-0.5 truncate">{{ $spek['nilai'] ?? $spek['keterangan'] ?? $spek['val'] ?? '' }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Bottom Actions & Admin Controls -->
                                <div class="mt-3 pt-2.5 border-t border-slate-100 flex flex-col gap-2">
                                    <!-- Status Unduhan & Tautan -->
                                    <div class="flex items-center justify-between text-[10px] text-slate-500 font-bold px-0.5">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <span class="flex items-center gap-1 text-slate-400"><i class="fa-solid fa-link text-cyan-600 text-[9px]"></i> Berkas:</span>
                                            @if($projek->tautan_unduh_apk)
                                                <span class="px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 text-[8.5px] font-mono font-bold flex items-center gap-1"><i class="fa-brands fa-android"></i> APK</span>
                                            @endif
                                            @if($projek->tautan_unduh_desktop)
                                                <span class="px-1.5 py-0.5 rounded bg-cyan-50 text-cyan-700 border border-cyan-200 text-[8.5px] font-mono font-bold flex items-center gap-1"><i class="fa-brands fa-windows"></i> Desktop</span>
                                            @endif
                                            @if($projek->tautan_demo)
                                                <span class="px-1.5 py-0.5 rounded bg-blue-50 text-blue-700 border border-blue-200 text-[8.5px] font-mono font-bold flex items-center gap-1"><i class="fa-solid fa-globe"></i> Live</span>
                                            @endif
                                            @if($projek->tautan_repositori)
                                                <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 border border-slate-200 text-[8.5px] font-mono font-bold flex items-center gap-1"><i class="fa-brands fa-github"></i> Git</span>
                                            @endif
                                            @if(!$projek->tautan_unduh_apk && !$projek->tautan_unduh_desktop && !$projek->tautan_demo && !$projek->tautan_repositori)
                                                <span class="text-slate-400 font-mono text-[9px]">Belum ada tautan</span>
                                            @endif
                                        </div>
                                        <span class="text-[9px] text-slate-400 font-mono">{{ $projek->kategori }}</span>
                                    </div>

                                    <!-- Action Buttons: Ubah, Hapus & Zoom -->
                                    <div class="flex items-center gap-1.5">
                                        <a href="{{ route('admin.projek.ubah', $projek) }}" class="flex-1 py-1.5 px-3 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-[10px] tracking-wider transition-all flex items-center justify-center gap-1.5 shadow-2xs active:scale-95 cursor-pointer">
                                            <i class="fa-solid fa-pen-to-square text-[9px] {{ $temaAktif['active_nav_icon'] }}"></i>
                                            <span>Ubah Projek</span>
                                        </a>

                                        <button type="button" onclick="bukaModalZoomAdmin('{{ asset($projek->gambar_desain ?? $projek->gambar_aplikasi ?? 'img/logo.png') }}', '{{ addslashes($projek->judul) }}')" class="py-1.5 px-2.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-[10px] transition-all flex items-center justify-center gap-1 active:scale-95 cursor-pointer" title="Zoom Media">
                                            <i class="fa-solid fa-expand text-[9px]"></i>
                                            <span class="hidden sm:inline">Zoom</span>
                                        </button>

                                        <form action="{{ route('admin.projek.hapus', $projek) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus projek {{ addslashes($projek->judul) }}?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-1.5 px-2.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold text-[10px] transition-all flex items-center justify-center gap-1 active:scale-95 cursor-pointer" title="Hapus Projek">
                                                <i class="fa-solid fa-trash text-[9px]"></i>
                                                <span class="hidden sm:inline">Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs py-12 text-center text-slate-400 text-xs">
                    <i class="fa-solid fa-layer-group text-slate-300 text-3xl mb-2 block"></i>
                    Belum ada karya atau projek portofolio yang tersimpan di database.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Mode 2: Tampilan Tabel Data Administratif -->
    <div id="view-mode-tabel" class="hidden">
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs overflow-hidden">
            <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-slate-50 text-slate-600 border-b border-slate-200 uppercase text-[9.5px] tracking-wider font-bold">
                            <tr>
                                <th class="py-2.5 px-3 text-center w-10 font-racing">No</th>
                                <th class="py-2.5 px-3 w-12">Media</th>
                                <th class="py-2.5 px-3">Judul & Kategori</th>
                                <th class="py-2.5 px-3">Lencana</th>
                                <th class="py-2.5 px-3">Berkas Unduhan</th>
                                <th class="py-2.5 px-3 text-center w-16 font-racing">Urutan</th>
                                <th class="py-2.5 px-3 text-center w-24">Status</th>
                                <th class="py-2.5 px-3 text-right w-24">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @forelse($daftarProjek as $index => $item)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-2 px-3 text-center font-racing font-bold text-slate-400 text-xs">{{ $index + 1 }}</td>
                                    <td class="py-2 px-3">
                                        <div class="w-9 h-9 rounded-lg bg-slate-950 border border-slate-800 overflow-hidden flex items-center justify-center flex-shrink-0 p-0.5 shadow-2xs cursor-pointer" onclick="bukaModalZoomAdmin('{{ asset($item->gambar_desain ?? $item->gambar_aplikasi ?? 'img/logo.png') }}', '{{ addslashes($item->judul) }}')">
                                            @if($item->gambar_desain || $item->gambar_aplikasi)
                                                <img src="{{ asset($item->gambar_desain ?? $item->gambar_aplikasi) }}" alt="" class="w-full h-full object-contain">
                                            @else
                                                <i class="fa-solid fa-laptop-code text-slate-400 text-xs"></i>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-2 px-3">
                                        <h4 class="font-bold text-slate-900 text-xs truncate max-w-xs">{{ $item->judul }}</h4>
                                        <span class="inline-block text-[9.5px] font-racing font-bold uppercase text-slate-500 mt-0.5">{{ $item->kategori }}</span>
                                        <p class="text-[10.5px] text-slate-400 line-clamp-1 max-w-sm mt-0.5">{{ $item->deskripsi }}</p>
                                    </td>
                                    <td class="py-2 px-3 whitespace-nowrap">
                                        <span class="px-2 py-0.5 rounded-full text-[8.5px] font-racing font-bold uppercase tracking-wider border {{ $temaAktif['badge'] }}">
                                            {{ $item->lencana_kategori }}
                                        </span>
                                        @if($item->subjudul_lencana)
                                            <span class="block text-[8.5px] text-slate-400 mt-0.5 font-mono">{{ $item->subjudul_lencana }}</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-3">
                                        <div class="flex flex-col gap-0.5 text-[9.5px]">
                                            @if($item->tautan_unduh_apk)
                                                <span class="text-emerald-700 font-mono font-bold flex items-center gap-1"><i class="fa-brands fa-android text-emerald-600 text-[10px]"></i> APK</span>
                                            @endif
                                            @if($item->tautan_unduh_desktop)
                                                <span class="text-cyan-700 font-mono font-bold flex items-center gap-1"><i class="fa-brands fa-windows text-cyan-600 text-[10px]"></i> Desktop</span>
                                            @endif
                                            @if(!$item->tautan_unduh_apk && !$item->tautan_unduh_desktop)
                                                <span class="text-slate-400 font-mono text-[10px]">-</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-2 px-3 text-center font-racing font-bold text-slate-900 text-xs">{{ $item->urutan }}</td>
                                    <td class="py-2 px-3 text-center whitespace-nowrap">
                                        <form action="{{ route('admin.projek.status', $item) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="px-2 py-0.5 rounded-full text-[9px] font-bold transition-all cursor-pointer {{ $item->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100' }}" title="Klik untuk ubah status tayang">
                                                {{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-2 px-3 text-right whitespace-nowrap">
                                        <div class="flex items-center justify-end gap-1">
                                            <a href="{{ route('admin.projek.ubah', $item) }}" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Ubah Projek">
                                                <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                            </a>
                                            <form action="{{ route('admin.projek.hapus', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus projek ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-rose-100 hover:text-rose-700 text-slate-500 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Hapus">
                                                    <i class="fa-solid fa-trash text-[10px]"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-8 text-center text-slate-400 text-xs">
                                        Belum ada data karya atau projek portofolio yang tersimpan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>

<!-- Modal Zoom Media Gambar Penuh -->
<div id="modal-zoom-admin" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-slate-950/80 backdrop-blur-sm p-4" onclick="tutupModalZoomAdmin(event)">
    <div class="relative max-w-4xl w-full bg-slate-900 rounded-2xl border border-slate-700 overflow-hidden shadow-2xl p-4 flex flex-col" onclick="event.stopPropagation()">
        <!-- Header Modal -->
        <div class="flex items-center justify-between pb-3 border-b border-slate-800 mb-3">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <h4 id="modal-zoom-title" class="font-racing font-bold text-white text-sm uppercase tracking-wider">Preview Media Projek</h4>
            </div>
            <button type="button" onclick="tutupModalZoomAdmin()" class="w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition-colors cursor-pointer" title="Tutup">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>

        <!-- Body Modal Gambar -->
        <div class="flex items-center justify-center min-h-[300px] max-h-[75vh] overflow-hidden bg-slate-950 rounded-xl p-2">
            <img id="modal-zoom-img" src="" alt="Preview Media" class="max-w-full max-h-[70vh] object-contain rounded-lg shadow-lg">
        </div>
    </div>
</div>

<script>
    // Mode Switcher (Kartu vs Tabel)
    function setMode(mode) {
        const viewKartu = document.getElementById('view-mode-kartu');
        const viewTabel = document.getElementById('view-mode-tabel');
        const btnKartu = document.getElementById('btn-mode-kartu');
        const btnTabel = document.getElementById('btn-mode-tabel');

        if (mode === 'kartu') {
            viewKartu.classList.remove('hidden');
            viewTabel.classList.add('hidden');
            btnKartu.className = "px-2.5 py-1 rounded-md bg-slate-900 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs";
            btnTabel.className = "px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1 cursor-pointer";
            localStorage.setItem('admin_projek_view_mode', 'kartu');
        } else {
            viewKartu.classList.add('hidden');
            viewTabel.classList.remove('hidden');
            btnTabel.className = "px-2.5 py-1 rounded-md bg-slate-900 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs";
            btnKartu.className = "px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1 cursor-pointer";
            localStorage.setItem('admin_projek_view_mode', 'tabel');
        }
    }

    // Toggle Tab Gambar (Layout PCB vs Aplikasi)
    function gantiMediaAdmin(index, type, imgSrc) {
        const img = document.getElementById(`admin-prj-img-${index}`);
        if (img) img.src = imgSrc;

        const tabDesain = document.getElementById(`tab-admin-prj-${index}-desain`);
        const tabApp = document.getElementById(`tab-admin-prj-${index}-app`);

        if (type === 'desain') {
            if (tabDesain) {
                tabDesain.className = "px-2 py-0.5 rounded-md bg-gradient-to-r from-purple-600 to-rose-600 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs";
            }
            if (tabApp) {
                tabApp.className = "px-2 py-0.5 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1 cursor-pointer";
            }
        } else {
            if (tabApp) {
                tabApp.className = "px-2 py-0.5 rounded-md bg-gradient-to-r from-blue-600 to-indigo-600 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs";
            }
            if (tabDesain) {
                tabDesain.className = "px-2 py-0.5 rounded-md text-slate-400 hover:text-slate-200 transition-all flex items-center gap-1 cursor-pointer";
            }
        }
    }

    // Filter Kategori
    function filterKategori(kat, btnEl) {
        document.querySelectorAll('.btn-filter-kat').forEach(b => {
            b.className = "btn-filter-kat px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-slate-600 hover:border-slate-400 transition-colors cursor-pointer text-[10.5px]";
        });
        btnEl.className = "btn-filter-kat px-2.5 py-1 rounded-lg bg-slate-900 text-white shadow-xs cursor-pointer text-[10.5px] transition-colors";

        const cards = document.querySelectorAll('.admin-project-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardKat = card.getAttribute('data-kategori');
            if (kat === 'all' || cardKat === kat) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        const countEl = document.getElementById('admin-prj-count');
        if (countEl) countEl.innerText = visibleCount;
    }

    // Modal Zoom
    function bukaModalZoomAdmin(imgUrl, title) {
        const modal = document.getElementById('modal-zoom-admin');
        const img = document.getElementById('modal-zoom-img');
        const titleEl = document.getElementById('modal-zoom-title');

        if (img) img.src = imgUrl;
        if (titleEl) titleEl.innerText = title || 'Preview Media Projek';
        if (modal) modal.classList.remove('hidden');
    }

    function tutupModalZoomAdmin() {
        const modal = document.getElementById('modal-zoom-admin');
        if (modal) modal.classList.add('hidden');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            tutupModalZoomAdmin();
        }
    });

    // Inisialisasi Mode dari localStorage
    document.addEventListener('DOMContentLoaded', function() {
        const savedMode = localStorage.getItem('admin_projek_view_mode') || 'kartu';
        setMode(savedMode);
    });
</script>
@endsection
