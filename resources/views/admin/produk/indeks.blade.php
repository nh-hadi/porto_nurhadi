@extends('admin.tata_letak.utama')

@section('judul', 'Katalog Produk IDS Store')
@section('halaman_judul', 'Katalog Produk & Hardware')
@section('halaman_subjudul', 'Kelola etalase modul mikrokontroler, PSU, dev-kit IoT, dan jasa kustom IDS Store')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp

@section('konten')
<div class="space-y-3.5 w-full">

    <!-- Header & Action Button (Clean Card) -->
    <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs px-4 py-3 flex flex-col sm:flex-row sm:items-center justify-between gap-2.5">
        <div>
            <div class="flex items-center gap-1.5 mb-0.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span class="font-racing font-bold text-[10px] uppercase tracking-widest text-[#2a2185]">
                    ETALASE & TOKO RESMI
                </span>
            </div>
            <h2 class="text-sm sm:text-base font-extrabold text-slate-900 tracking-tight font-racing">Katalog Produk IDS Store</h2>
            <p class="text-[11px] text-slate-500">Tersinkron dengan etalase website: <span class="text-slate-900 font-bold font-mono">{{ $daftarProduk->count() }} produk/jasa</span></p>
        </div>

        <a href="{{ route('admin.produk.buat') }}" class="px-3.5 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider shadow-2xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
            <i class="fa-solid fa-plus text-[9px]"></i>
            <span>+ Produk Baru</span>
        </a>
    </div>

    <!-- Tabel Produk Toko -->
    <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-600 border-b border-slate-200 uppercase text-[9.5px] tracking-wider font-bold">
                        <tr>
                            <th class="py-2.5 px-3 text-center w-10 font-racing">No</th>
                            <th class="py-2.5 px-3 w-12">Foto</th>
                            <th class="py-2.5 px-3">Kode & Nama Produk</th>
                            <th class="py-2.5 px-3">Kategori</th>
                            <th class="py-2.5 px-3 font-racing">Harga</th>
                            <th class="py-2.5 px-3 text-center w-20">Stok</th>
                            <th class="py-2.5 px-3 text-center w-16 font-racing">Urutan</th>
                            <th class="py-2.5 px-3 text-center w-24">Status</th>
                            <th class="py-2.5 px-3 text-right w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($daftarProduk as $index => $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-2 px-3 text-center font-racing font-bold text-slate-400 text-xs">{{ $index + 1 }}</td>
                                <td class="py-2 px-3">
                                    <div class="w-9 h-9 rounded-lg bg-slate-100 border border-slate-200 overflow-hidden flex items-center justify-center flex-shrink-0 p-0.5 shadow-2xs">
                                        @if($item->gambar)
                                            <img src="{{ asset($item->gambar) }}" alt="" class="w-full h-full object-contain">
                                        @else
                                            <i class="fa-solid fa-bolt text-slate-400 text-xs"></i>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-2 px-3">
                                    <span class="text-[9px] font-mono font-bold text-slate-500 bg-slate-100 px-1.5 py-0.2 rounded border border-slate-200">{{ $item->kode_produk }}</span>
                                    <h4 class="font-bold text-slate-900 text-xs mt-0.5 truncate max-w-xs">{{ $item->nama_produk }}</h4>
                                    <p class="text-[10.5px] text-slate-400 line-clamp-1 max-w-sm mt-0.5">{{ $item->deskripsi_singkat }}</p>
                                </td>
                                <td class="py-2 px-3 whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[8.5px] font-racing font-bold uppercase tracking-wider border {{ $temaAktif['badge'] }}">
                                        {{ $item->lencana_kategori }}
                                    </span>
                                    @if($item->tag_chip)
                                        <span class="block text-[8.5px] text-slate-400 mt-0.5 font-mono">{{ $item->tag_chip }}</span>
                                    @endif
                                </td>
                                <td class="py-2 px-3 whitespace-nowrap">
                                    <span class="font-racing font-bold text-xs {{ $temaAktif['icon'] }}">{{ $item->harga_format }}</span>
                                </td>
                                <td class="py-2 px-3 text-center whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-md text-[9px] font-bold {{ $item->status_stok === 'Ready' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-amber-50 text-amber-700 border border-amber-200' }}">
                                        {{ $item->status_stok }}
                                    </span>
                                </td>
                                <td class="py-2 px-3 text-center font-racing font-bold text-slate-900 text-xs">{{ $item->urutan }}</td>
                                <td class="py-2 px-3 text-center whitespace-nowrap">
                                    <form action="{{ route('admin.produk.status', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2 py-0.5 rounded-full text-[9px] font-bold transition-all cursor-pointer {{ $item->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100' }}" title="Klik untuk ubah status etalase">
                                            {{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="py-2 px-3 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('admin.produk.ubah', $item) }}" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Ubah Produk">
                                            <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        </a>
                                        <form action="{{ route('admin.produk.hapus', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
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
                                <td colspan="9" class="py-8 text-center text-slate-400 text-xs">
                                    Belum ada produk atau layanan IDS Store yang tersimpan di database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
