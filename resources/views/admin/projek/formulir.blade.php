@extends('admin.tata_letak.utama')

@section('judul', $isEdit ? 'Ubah Projek' : 'Tambah Projek')
@section('halaman_judul', $isEdit ? 'Ubah Projek Portofolio' : 'Tambah Projek Portofolio Baru')
@section('halaman_subjudul', 'Kelola data projek, upload foto layout PCB / screenshot aplikasi, dan berkas unduhan')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp

@section('konten')
<div class="space-y-3 w-full">
    
    <div>
        <a href="{{ route('admin.projek.indeks') }}" class="text-xs text-slate-500 hover:text-slate-800 transition-colors inline-flex items-center gap-1.5 font-bold">
            <i class="fa-solid fa-arrow-left text-[10px] {{ $temaAktif['icon'] }}"></i>
            <span>Kembali ke Daftar Projek</span>
        </a>
    </div>

    <form action="{{ $isEdit ? route('admin.projek.perbarui', $projek) : route('admin.projek.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-3.5">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
            
            <!-- Kolom Kiri: Informasi Pokok & Deskripsi -->
            <div class="lg:col-span-7 space-y-3.5">
                
                <!-- Informasi Pokok Projek -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-circle-info text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Informasi Pokok Projek</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="sm:col-span-2">
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Judul Projek</label>
                            <input type="text" name="judul" value="{{ old('judul', $projek->judul ?? '') }}" required placeholder="Contoh: Smart Digital PSU V1.0.2" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-medium">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Kategori Projek</label>
                            <input type="text" name="kategori" value="{{ old('kategori', $projek->kategori ?? 'Hardware') }}" required placeholder="Contoh: Hardware, IoT" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-medium">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Lencana Kategori (Badge Utama)</label>
                            <input type="text" name="lencana_kategori" value="{{ old('lencana_kategori', $projek->lencana_kategori ?? 'PROTOTYPE HARDWARE') }}" required placeholder="Contoh: PROTOTYPE HARDWARE" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs uppercase font-racing outline-hidden transition-colors">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Subjudul Lencana (Chip Tech)</label>
                            <input type="text" name="subjudul_lencana" value="{{ old('subjudul_lencana', $projek->subjudul_lencana ?? '') }}" placeholder="Contoh: ESP-12F IoT" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-mono">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Urutan Tampil</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $projek->urutan ?? 1) }}" min="0" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-racing font-bold">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Deskripsi Lengkap Projek</label>
                            <textarea name="deskripsi" rows="3" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden leading-relaxed transition-colors font-medium">{{ old('deskripsi', $projek->deskripsi ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 4 Panel Sorotan Teknis -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-table-cells-large text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">4 Panel Sorotan Teknis</h3>
                    </div>

                    @php
                        $sorotanList = $projek->sorotan_teknis ?? [
                            ['judul' => '', 'keterangan' => '', 'ikon' => 'fa-solid fa-microchip', 'warna' => 'text-rose-500'],
                            ['judul' => '', 'keterangan' => '', 'ikon' => 'fa-solid fa-bolt', 'warna' => 'text-amber-500'],
                            ['judul' => '', 'keterangan' => '', 'ikon' => 'fa-solid fa-chart-simple', 'warna' => 'text-cyan-500'],
                            ['judul' => '', 'keterangan' => '', 'ikon' => 'fa-solid fa-wifi', 'warna' => 'text-purple-500'],
                        ];
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        @for($i = 0; $i < 4; $i++)
                            @php $item = $sorotanList[$i] ?? ['judul' => '', 'keterangan' => '', 'ikon' => 'fa-solid fa-microchip', 'warna' => 'text-rose-500']; @endphp
                            <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-200/90 space-y-1.5">
                                <span class="text-[9.5px] font-racing font-bold text-slate-500 uppercase tracking-wider block">Sorotan #{{ $i + 1 }}</span>
                                <div class="grid grid-cols-2 gap-1.5">
                                    <input type="text" name="sorotan_judul[]" value="{{ old('sorotan_judul.'.$i, $item['judul'] ?? '') }}" placeholder="Judul" class="w-full px-2 py-1 rounded bg-white border border-slate-200 text-xs text-slate-800 outline-hidden font-bold">
                                    <input type="text" name="sorotan_ikon[]" value="{{ old('sorotan_ikon.'.$i, $item['ikon'] ?? 'fa-solid fa-microchip') }}" placeholder="fa-solid fa-microchip" class="w-full px-2 py-1 rounded bg-white border border-slate-200 text-xs text-slate-800 font-mono outline-hidden">
                                </div>
                                <input type="text" name="sorotan_keterangan[]" value="{{ old('sorotan_keterangan.'.$i, $item['keterangan'] ?? '') }}" placeholder="Keterangan singkat..." class="w-full px-2 py-1 rounded bg-white border border-slate-200 text-[11px] text-slate-800 outline-hidden">
                                <input type="hidden" name="sorotan_warna[]" value="{{ $item['warna'] ?? 'text-rose-500' }}">
                            </div>
                        @endfor
                    </div>
                </div>

            </div>

            <!-- Kolom Kanan: Media Gambar & Tautan Berkas -->
            <div class="lg:col-span-5 space-y-3.5">
                
                <!-- Media Gambar: Desain PCB & Interface Aplikasi -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-images text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Gambar Desain & Mockup (Dual View)</h3>
                    </div>

                    <!-- Media 1: Gambar Desain / PCB -->
                    <div class="space-y-1.5 p-2.5 rounded-lg bg-slate-50 border border-slate-200/90">
                        <label class="text-[10.5px] font-bold text-slate-800 uppercase tracking-wider block font-racing">1. Desain Layout PCB</label>
                        @if(!empty($projek->gambar_desain))
                            <div class="w-full h-24 rounded bg-white border border-slate-200 flex items-center justify-center overflow-hidden p-1 shadow-2xs">
                                <img src="{{ asset($projek->gambar_desain) }}" alt="Preview Desain" class="max-h-full max-w-full object-contain">
                            </div>
                        @endif
                        <div>
                            <input type="file" name="gambar_desain_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-[10px] file:font-semibold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer">
                            <input type="text" name="gambar_desain_url" value="{{ old('gambar_desain_url', $projek->gambar_desain ?? '') }}" placeholder="Path lokal: projects/smart-psu/pcb/..." class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-slate-800 text-[11px] mt-1 outline-hidden font-mono">
                        </div>
                    </div>

                    <!-- Media 2: Gambar Aplikasi / Mockup -->
                    <div class="space-y-1.5 p-2.5 rounded-lg bg-slate-50 border border-slate-200/90">
                        <label class="text-[10.5px] font-bold text-slate-800 uppercase tracking-wider block font-racing">2. Mockup Aplikasi / Dashboard</label>
                        @if(!empty($projek->gambar_aplikasi))
                            <div class="w-full h-24 rounded bg-white border border-slate-200 flex items-center justify-center overflow-hidden p-1 shadow-2xs">
                                <img src="{{ asset($projek->gambar_aplikasi) }}" alt="Preview Aplikasi" class="max-h-full max-w-full object-contain">
                            </div>
                        @endif
                        <div>
                            <input type="file" name="gambar_aplikasi_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-[10px] file:font-semibold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer">
                            <input type="text" name="gambar_aplikasi_url" value="{{ old('gambar_aplikasi_url', $projek->gambar_aplikasi ?? '') }}" placeholder="Path lokal: projects/smart-psu/app/..." class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-slate-800 text-[11px] mt-1 outline-hidden font-mono">
                        </div>
                    </div>
                </div>

                <!-- Berkas Unduhan & Tautan Luar -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-2.5">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-download text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Berkas Unduhan & Repositori</h3>
                    </div>

                    <div class="space-y-2">
                        <div>
                            <label class="text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Tautan Unduh APK Android</label>
                            <input type="text" name="tautan_unduh_apk" value="{{ old('tautan_unduh_apk', $projek->tautan_unduh_apk ?? '') }}" placeholder="projects/smart-psu/downloads/app.apk" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-mono">
                        </div>

                        <div>
                            <label class="text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Tautan Unduh Desktop (Windows)</label>
                            <input type="text" name="tautan_unduh_desktop" value="{{ old('tautan_unduh_desktop', $projek->tautan_unduh_desktop ?? '') }}" placeholder="projects/smart-psu/downloads/app.zip" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-mono">
                        </div>

                        <div>
                            <label class="text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Tautan Demo Live (URL)</label>
                            <input type="url" name="tautan_demo" value="{{ old('tautan_demo', $projek->tautan_demo ?? '') }}" placeholder="https://..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                        </div>

                        <div>
                            <label class="text-[10px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Tautan Repositori GitHub</label>
                            <input type="url" name="tautan_repositori" value="{{ old('tautan_repositori', $projek->tautan_repositori ?? '') }}" placeholder="https://github.com/..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                        </div>
                    </div>
                </div>

                <!-- Status Aktif -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] text-slate-800 font-bold select-none">
                        <input type="checkbox" name="status_aktif" value="1" {{ old('status_aktif', $projek->status_aktif ?? true) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900 h-3.5 w-3.5">
                        <span>Tayangkan projek di slider website utama</span>
                    </label>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-2 pt-1">
                    <a href="{{ route('admin.projek.indeks') }}" class="px-4 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-xs uppercase tracking-wider shadow-2xs hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-floppy-disk text-amber-400 text-xs"></i>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan' }}</span>
                    </button>
                </div>

            </div>

        </div>

    </form>
</div>
@endsection
