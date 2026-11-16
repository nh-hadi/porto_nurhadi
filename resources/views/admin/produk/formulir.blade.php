@extends('admin.tata_letak.utama')

@section('judul', $isEdit ? 'Ubah Produk Toko' : 'Tambah Produk Toko')
@section('halaman_judul', $isEdit ? 'Ubah Produk / Jasa IDS Store' : 'Tambah Produk / Jasa Baru')
@section('halaman_subjudul', 'Kelola spesifikasi teknis, harga, gambar, dan tombol order WhatsApp')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp

@section('konten')
<div class="space-y-3 w-full">
    
    <div>
        <a href="{{ route('admin.produk.indeks') }}" class="text-xs text-slate-500 hover:text-slate-800 transition-colors inline-flex items-center gap-1.5 font-bold">
            <i class="fa-solid fa-arrow-left text-[10px] {{ $temaAktif['icon'] }}"></i>
            <span>Kembali ke Katalog Produk</span>
        </a>
    </div>

    <form action="{{ $isEdit ? route('admin.produk.perbarui', $produk) : route('admin.produk.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-3.5">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
            
            <!-- Kolom Kiri: Identitas Pokok Produk -->
            <div class="lg:col-span-7 space-y-3.5">
                
                <!-- Informasi Pokok Produk -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-store text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Identitas & Informasi Produk</h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Kode SKU</label>
                            <input type="text" name="kode_produk" value="{{ old('kode_produk', $produk->kode_produk ?? 'IDS-') }}" required placeholder="IDS-PSU-01" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs font-mono uppercase outline-hidden transition-colors">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}" required placeholder="Smart Digital PSU V1.0.2 Kit" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-medium">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Kategori Filter</label>
                            <select name="kategori" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden cursor-pointer transition-colors font-semibold">
                                <option value="psu" {{ old('kategori', $produk->kategori ?? '') === 'psu' ? 'selected' : '' }}>Power & PSU</option>
                                <option value="iot" {{ old('kategori', $produk->kategori ?? '') === 'iot' ? 'selected' : '' }}>IoT Board</option>
                                <option value="custom" {{ old('kategori', $produk->kategori ?? '') === 'custom' ? 'selected' : '' }}>Jasa Custom</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Lencana / Badge</label>
                            <input type="text" name="lencana_kategori" value="{{ old('lencana_kategori', $produk->lencana_kategori ?? 'PSU UNIT') }}" required placeholder="PSU UNIT" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs uppercase font-racing outline-hidden transition-colors">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Status Ketersediaan</label>
                            <select name="status_stok" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden cursor-pointer transition-colors font-semibold">
                                <option value="Ready" {{ old('status_stok', $produk->status_stok ?? '') === 'Ready' ? 'selected' : '' }}>Ready Stock</option>
                                <option value="Pre-Order" {{ old('status_stok', $produk->status_stok ?? '') === 'Pre-Order' ? 'selected' : '' }}>Pre-Order</option>
                                <option value="Kilat" {{ old('status_stok', $produk->status_stok ?? '') === 'Kilat' ? 'selected' : '' }}>Layanan Kilat</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Tag Chip Pojok</label>
                            <input type="text" name="tag_chip" value="{{ old('tag_chip', $produk->tag_chip ?? '') }}" placeholder="ESP-12F • 16-Bit ADC" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-mono">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Sub-Kategori Teks</label>
                            <input type="text" name="sub_kategori" value="{{ old('sub_kategori', $produk->sub_kategori ?? '') }}" placeholder="Precision Power" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Harga Resmi (Rp)</label>
                            <input type="number" name="harga" value="{{ old('harga', $produk->harga ?? 0) }}" min="0" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs font-racing outline-hidden transition-colors font-bold">
                        </div>

                        <div class="sm:col-span-3">
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Deskripsi Singkat (Tampil di Kartu)</label>
                            <textarea name="deskripsi_singkat" rows="2" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden leading-relaxed transition-colors font-medium">{{ old('deskripsi_singkat', $produk->deskripsi_singkat ?? '') }}</textarea>
                        </div>

                        <div class="sm:col-span-3">
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Deskripsi Lengkap (Modal Pop-up)</label>
                            <textarea name="deskripsi_lengkap" rows="2" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden leading-relaxed transition-colors font-medium">{{ old('deskripsi_lengkap', $produk->deskripsi_lengkap ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Spesifikasi Teknis Dynamic Repeater -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-list-check text-[#2a2185] text-xs"></i>
                            <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Spesifikasi & Fitur Teknis</h3>
                        </div>
                        <span class="text-[9.5px] font-mono text-slate-400">Maks. 6 entri</span>
                    </div>

                    @php
                        $spekList = $produk->spesifikasi_teknis ?? [
                            ['label' => 'Mikrokontroler', 'nilai' => 'ESP-12F Wi-Fi', 'ikon' => 'fa-solid fa-microchip', 'warna' => 'text-rose-500'],
                            ['label' => 'Output Tegangan', 'nilai' => '1.5V - 30V Presisi', 'ikon' => 'fa-solid fa-bolt', 'warna' => 'text-amber-500'],
                            ['label' => 'Aplikasi Pendukung', 'nilai' => 'Flutter & Windows Desktop', 'ikon' => 'fa-solid fa-mobile-screen', 'warna' => 'text-emerald-500'],
                        ];
                    @endphp

                    <div class="space-y-2">
                        @for($i = 0; $i < 6; $i++)
                            @php $item = $spekList[$i] ?? ['label' => '', 'nilai' => '', 'ikon' => 'fa-solid fa-microchip', 'warna' => 'text-rose-500']; @endphp
                            <div class="p-2 rounded-lg bg-slate-50 border border-slate-200/90 grid grid-cols-1 sm:grid-cols-12 gap-2 items-center">
                                <div class="sm:col-span-4">
                                    <input type="text" name="spek_label[]" value="{{ old('spek_label.'.$i, $item['label'] ?? '') }}" placeholder="Label" class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-xs text-slate-800 outline-hidden font-bold">
                                </div>
                                <div class="sm:col-span-5">
                                    <input type="text" name="spek_nilai[]" value="{{ old('spek_nilai.'.$i, $item['nilai'] ?? '') }}" placeholder="Nilai spek" class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-xs text-slate-800 outline-hidden">
                                </div>
                                <div class="sm:col-span-3">
                                    <input type="text" name="spek_ikon[]" value="{{ old('spek_ikon.'.$i, $item['ikon'] ?? 'fa-solid fa-microchip') }}" placeholder="fa-solid fa-microchip" class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-xs text-slate-800 font-mono outline-hidden">
                                    <input type="hidden" name="spek_warna[]" value="{{ $item['warna'] ?? 'text-rose-500' }}">
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

            </div>

            <!-- Kolom Kanan: Foto Produk & Pemesanan -->
            <div class="lg:col-span-5 space-y-3.5">
                
                <!-- Foto Produk & WhatsApp -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                    <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                        <i class="fa-solid fa-image text-[#2a2185] text-xs"></i>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Foto & Tautan Pemesanan</h3>
                    </div>

                    <!-- Foto Produk -->
                    <div class="space-y-1.5 p-2.5 rounded-lg bg-slate-50 border border-slate-200/90">
                        <label class="text-[10.5px] font-bold text-slate-800 uppercase tracking-wider block font-racing">Foto Resmi Produk</label>
                        @if(!empty($produk->gambar))
                            <div class="w-full h-28 rounded bg-white border border-slate-200 flex items-center justify-center overflow-hidden p-1 shadow-2xs">
                                <img src="{{ asset($produk->gambar) }}" alt="Preview" class="max-h-full max-w-full object-contain">
                            </div>
                        @endif
                        <div>
                            <input type="file" name="gambar_file" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-[10px] file:font-semibold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer">
                            <input type="text" name="gambar_url" value="{{ old('gambar_url', $produk->gambar ?? '') }}" placeholder="Path: products/psu-kit.png" class="w-full px-2.5 py-1 rounded bg-white border border-slate-200 text-slate-800 text-[11px] mt-1 outline-hidden font-mono">
                        </div>
                    </div>

                    <div class="space-y-2.5">
                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Template WhatsApp</label>
                            <textarea name="teks_pesan_wa" rows="2" placeholder="Halo IDS Store, saya ingin memesan..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden leading-relaxed transition-colors">{{ old('teks_pesan_wa', $produk->teks_pesan_wa ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Tautan Pembelian Eksternal</label>
                            <input type="url" name="tautan_pembelian" value="{{ old('tautan_pembelian', $produk->tautan_pembelian ?? '') }}" placeholder="https://tokopedia.com/..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                        </div>

                        <div>
                            <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-0.5 block">Urutan Tampil</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $produk->urutan ?? 1) }}" min="0" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-racing font-bold">
                        </div>
                    </div>
                </div>

                <!-- Status Aktif -->
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3">
                    <label class="flex items-center gap-2 cursor-pointer text-[11px] text-slate-800 font-bold select-none">
                        <input type="checkbox" name="status_aktif" value="1" {{ old('status_aktif', $produk->status_aktif ?? true) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900 h-3.5 w-3.5">
                        <span>Tampilkan produk di etalase IDS Store</span>
                    </label>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end gap-2 pt-1">
                    <a href="{{ route('admin.produk.indeks') }}" class="px-4 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold transition-colors">
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
