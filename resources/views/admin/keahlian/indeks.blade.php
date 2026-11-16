@extends('admin.tata_letak.utama')

@section('judul', 'Keahlian & Kemampuan Teknis')
@section('halaman_judul', 'Keahlian & Kemampuan Teknis')
@section('halaman_subjudul', 'Kelola kartu kompetensi teknis yang tersimpan di database dan tampil pada slider utama')

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
                    KOMPETENSI UTAMA
                </span>
            </div>
            <h2 class="text-sm sm:text-base font-extrabold text-slate-900 tracking-tight font-racing">Daftar Keahlian & Kemampuan</h2>
            <p class="text-[11px] text-slate-500">Tersinkron dengan slider halaman utama: <span class="text-slate-900 font-bold font-mono">{{ $daftarKeahlian->count() }} keahlian</span></p>
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

            <!-- Tambah Button -->
            <a href="{{ route('admin.keahlian.buat') }}" class="px-3.5 py-1.5 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-[11px] uppercase tracking-wider shadow-2xs hover:scale-[1.02] active:scale-95 transition-all flex items-center justify-center gap-1.5 cursor-pointer w-full sm:w-auto">
                <i class="fa-solid fa-plus text-[9px]"></i>
                <span>+ Keahlian Baru</span>
            </a>
        </div>
    </div>

    <!-- Mode 1: Tampilan Visual Kartu -->
    <div id="view-mode-kartu" class="space-y-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
            @forelse($daftarKeahlian as $skill)
                @php
                    $themeColor = $skill->warna_tema ?? $temaAktif['key'];
                    $gradientClass = match($themeColor) {
                        'purple' => 'from-purple-500 via-pink-500 to-rose-500',
                        'cyan' => 'from-cyan-400 via-sky-500 to-blue-500',
                        'rose' => 'from-rose-500 via-pink-500 to-amber-500',
                        'emerald' => 'from-emerald-400 via-teal-500 to-cyan-500',
                        'amber' => 'from-amber-400 via-orange-500 to-amber-600',
                        default => $temaAktif['border'],
                    };
                    $iconBg = match($themeColor) {
                        'purple' => 'from-purple-500/10 to-rose-500/10 border-purple-200 text-purple-600',
                        'cyan' => 'from-cyan-500/10 to-blue-500/10 border-cyan-200 text-cyan-600',
                        'rose' => 'from-rose-500/10 to-amber-500/10 border-rose-200 text-rose-600',
                        'emerald' => 'from-emerald-500/10 to-teal-500/10 border-emerald-200 text-emerald-600',
                        'amber' => 'from-amber-500/10 to-orange-500/10 border-amber-200 text-amber-600',
                        default => 'from-slate-100 to-slate-200 border-slate-300 ' . $temaAktif['icon'],
                    };
                    $badgeClass = match($themeColor) {
                        'purple' => 'bg-purple-50 text-purple-700 border-purple-200',
                        'cyan' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                        'rose' => 'bg-rose-50 text-rose-700 border-rose-200',
                        'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'amber' => 'bg-amber-50 text-amber-700 border-amber-200',
                        default => $temaAktif['badge'],
                    };
                @endphp
                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 group flex flex-col p-3.5 justify-between relative overflow-hidden">
                    <div>
                        <!-- Header Kartu -->
                        <div>
                            <div class="flex items-start justify-between mb-2">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br {{ $iconBg }} border flex items-center justify-center group-hover:scale-105 transition-transform shadow-2xs">
                                    <i class="{{ $skill->ikon }} text-xs"></i>
                                </div>
                                <div class="flex flex-col items-end gap-0.5">
                                    <span class="text-[8.5px] font-racing font-bold px-2 py-0.5 rounded-full border {{ $badgeClass }}">
                                        {{ $skill->lencana }}
                                    </span>
                                    <span class="text-[8px] px-1.5 py-0.2 rounded font-mono font-bold {{ $skill->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-rose-50 text-rose-700 border border-rose-200' }}">
                                        {{ $skill->status_aktif ? 'Aktif' : 'Nonaktif' }} • #{{ $skill->urutan }}
                                    </span>
                                </div>
                            </div>

                            <!-- Judul & Deskripsi -->
                            <h3 class="font-bold text-slate-900 text-xs mb-1 group-hover:text-slate-700 transition-colors">
                                {{ $skill->judul }}
                            </h3>
                            <p class="text-[11px] text-slate-500 leading-snug mb-2 line-clamp-2">
                                {{ $skill->deskripsi }}
                            </p>
                        </div>

                        <!-- Label Teknologi & Tombol Aksi Admin -->
                        <div class="pt-1.5 border-t border-slate-100 mt-auto">
                            <div class="flex flex-wrap gap-1 mb-2 text-[9px] font-semibold text-slate-600">
                                @if(!empty($skill->label_teknologi))
                                    @foreach($skill->label_teknologi as $tIdx => $tag)
                                        <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 font-bold border border-slate-200">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                @endif
                            </div>

                            <!-- Bar Aksi Admin -->
                            <div class="flex items-center justify-between pt-1.5 border-t border-slate-100">
                                <form action="{{ route('admin.keahlian.status', $skill) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-0.5 rounded-md text-[9px] font-bold transition-all cursor-pointer {{ $skill->status_aktif ? 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200' : 'bg-rose-50 text-rose-700 hover:bg-rose-100 border border-rose-200' }}" title="Klik ubah status tampil di web">
                                        <i class="fa-solid {{ $skill->status_aktif ? 'fa-eye' : 'fa-eye-slash' }} mr-0.5"></i>
                                        {{ $skill->status_aktif ? 'Tampil' : 'Sembunyi' }}
                                    </button>
                                </form>

                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.keahlian.ubah', $skill) }}" class="px-2 py-0.5 rounded-md bg-slate-100 hover:bg-slate-200 text-slate-700 text-[9.5px] font-bold transition-all flex items-center gap-1 shadow-2xs">
                                        <i class="fa-solid fa-pen-to-square text-[9px]"></i>
                                        <span>Ubah</span>
                                    </a>
                                    <form action="{{ route('admin.keahlian.hapus', $skill) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus keahlian ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-rose-100 hover:text-rose-700 text-slate-500 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Hapus">
                                            <i class="fa-solid fa-trash text-[9.5px]"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-full py-8 text-center text-slate-400 text-xs bg-white rounded-xl border border-dashed border-slate-200">
                    Belum ada keahlian yang tersimpan di database.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Mode 2: Tabel Data Alternatif -->
    <div id="view-mode-tabel" class="hidden bg-white rounded-xl border border-slate-200/90 shadow-2xs overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-600 border-b border-slate-200 uppercase text-[9.5px] tracking-wider font-bold">
                        <tr>
                            <th class="py-2.5 px-3 text-center w-10 font-racing">No</th>
                            <th class="py-2.5 px-3">Ikon & Judul</th>
                            <th class="py-2.5 px-3">Lencana & Tema</th>
                            <th class="py-2.5 px-3">Label Teknologi</th>
                            <th class="py-2.5 px-3 text-center w-16 font-racing">Urutan</th>
                            <th class="py-2.5 px-3 text-center w-24">Status</th>
                            <th class="py-2.5 px-3 text-right w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse($daftarKeahlian as $index => $item)
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="py-2 px-3 text-center font-racing font-bold text-slate-400 text-xs">{{ $index + 1 }}</td>
                                <td class="py-2 px-3">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['icon'] }} flex items-center justify-center flex-shrink-0 text-xs shadow-2xs">
                                            <i class="{{ $item->ikon }}"></i>
                                        </div>
                                        <div class="min-w-0">
                                            <h4 class="font-bold text-slate-900 text-xs truncate max-w-sm">{{ $item->judul }}</h4>
                                            <p class="text-[10.5px] text-slate-400 line-clamp-1 max-w-sm">{{ $item->deskripsi }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-2 px-3 whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[8.5px] font-racing font-bold uppercase tracking-wider border {{ $temaAktif['badge'] }}">
                                        {{ $item->lencana }}
                                    </span>
                                    <span class="block text-[8.5px] text-slate-400 mt-0.5 capitalize font-mono">Tema: {{ $item->warna_tema }}</span>
                                </td>
                                <td class="py-2 px-3">
                                    <div class="flex flex-wrap gap-1 max-w-xs">
                                        @if(!empty($item->label_teknologi))
                                            @foreach($item->label_teknologi as $tIdx => $tag)
                                                <span class="px-1.5 py-0.2 rounded bg-slate-100 text-slate-700 border border-slate-200 text-[9px] font-mono font-bold">
                                                    {{ $tag }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-slate-400 text-xs">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-2 px-3 text-center font-racing font-bold text-slate-900 text-xs">{{ $item->urutan }}</td>
                                <td class="py-2 px-3 text-center whitespace-nowrap">
                                    <form action="{{ route('admin.keahlian.status', $item) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2 py-0.5 rounded-full text-[9px] font-bold transition-all cursor-pointer {{ $item->status_aktif ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100' }}">
                                            {{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="py-2 px-3 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('admin.keahlian.ubah', $item) }}" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-amber-100 hover:text-amber-800 text-slate-600 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Ubah">
                                            <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        </a>
                                        <form action="{{ route('admin.keahlian.hapus', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus keahlian ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-6 h-6 rounded-md bg-slate-100 hover:bg-rose-100 hover:text-rose-700 text-slate-600 flex items-center justify-center transition-all cursor-pointer shadow-2xs" title="Hapus">
                                                <i class="fa-solid fa-trash text-[10px]"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-8 text-center text-slate-400 text-xs">
                                    Belum ada data keahlian teknis yang tersimpan di database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
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
        } else {
            viewKartu.classList.add('hidden');
            viewTabel.classList.remove('hidden');
            btnTabel.className = "px-2.5 py-1 rounded-md bg-slate-900 text-white transition-all flex items-center gap-1 cursor-pointer shadow-2xs";
            btnKartu.className = "px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition-all flex items-center gap-1 cursor-pointer";
        }
    }
</script>
@endsection
