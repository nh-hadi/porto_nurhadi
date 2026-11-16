@extends('admin.tata_letak.utama')

@section('judul', $isEdit ? 'Ubah Keahlian & Kemampuan' : 'Tambah Keahlian & Kemampuan')
@section('halaman_judul', $isEdit ? 'Ubah Keahlian & Kemampuan Teknis' : 'Tambah Keahlian & Kemampuan Teknis Baru')
@section('halaman_subjudul', 'Kelola informasi kartu kompetensi teknis agar tampil presisi pada slider halaman utama')

@php
    $temaAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
@endphp

@section('konten')
<div class="space-y-3 w-full">
    
    <div>
        <a href="{{ route('admin.keahlian.indeks') }}" class="text-xs text-slate-500 hover:text-slate-800 transition-colors inline-flex items-center gap-1.5 font-bold">
            <i class="fa-solid fa-arrow-left text-[10px] {{ $temaAktif['icon'] }}"></i>
            <span>Kembali ke Daftar Keahlian</span>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-start">
        
        <!-- Formulir Input (Kiri - Compact) -->
        <div class="lg:col-span-7">
            <form action="{{ $isEdit ? route('admin.keahlian.perbarui', $keahlian) : route('admin.keahlian.simpan') }}" method="POST" class="space-y-3">
                @csrf
                @if($isEdit)
                    @method('PUT')
                @endif

                <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 sm:p-4 space-y-3">
                        
                        <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                            <i class="fa-solid fa-microchip {{ $temaAktif['icon'] }} text-xs"></i>
                            <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">
                                {{ $isEdit ? 'Formulir Perubahan Data Keahlian' : 'Formulir Data Keahlian Baru' }}
                            </h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="sm:col-span-2">
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Judul Keahlian & Kemampuan</label>
                                <input type="text" id="input-judul" name="judul" value="{{ old('judul', $keahlian->judul ?? '') }}" required placeholder="Contoh: Pembuatan Prototype IoT" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs outline-hidden transition-colors font-medium">
                            </div>

                            <div>
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Lencana / Badge</label>
                                <input type="text" id="input-lencana" name="lencana" value="{{ old('lencana', $keahlian->lencana ?? 'KOMPETENSI') }}" required placeholder="Contoh: REAL-TIME IOT" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs uppercase font-racing outline-hidden transition-colors">
                            </div>

                            <div>
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Warna Tema Gradient</label>
                                <select id="select-tema" name="warna_tema" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs outline-hidden cursor-pointer transition-colors font-semibold">
                                    @foreach(['amber' => 'Amber (Kuning / Oranye)', 'purple' => 'Purple (Ungu / Indigo)', 'cyan' => 'Cyan (Biru / Toska)', 'rose' => 'Rose (Merah Muda)', 'emerald' => 'Emerald (Hijau)'] as $key => $label)
                                        <option value="{{ $key }}" {{ old('warna_tema', $keahlian->warna_tema ?? 'amber') === $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Ikon FontAwesome</label>
                                <input type="text" id="input-ikon" name="ikon" value="{{ old('ikon', $keahlian->ikon ?? 'fa-solid fa-microchip') }}" required placeholder="fa-solid fa-microchip" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs font-mono outline-hidden transition-colors">
                                <p class="text-[9.5px] text-slate-400 mt-0.5">Class FA6: <code class="{{ $temaAktif['icon'] }} font-mono">fa-solid fa-microchip</code></p>
                            </div>

                            <div>
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Urutan Tampil</label>
                                <input type="number" name="urutan" value="{{ old('urutan', $keahlian->urutan ?? 1) }}" min="0" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs outline-hidden transition-colors font-racing font-bold">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Deskripsi Singkat Keahlian</label>
                                <textarea id="input-deskripsi" name="deskripsi" rows="2" required placeholder="Deskripsikan ruang lingkup dan spesialisasi keahlian..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs outline-hidden leading-relaxed transition-colors font-medium">{{ old('deskripsi', $keahlian->deskripsi ?? '') }}</textarea>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Label Teknologi (Dipisahkan koma)</label>
                                <input type="text" id="input-tags" name="label_teknologi" value="{{ old('label_teknologi', is_array($keahlian->label_teknologi) ? implode(', ', $keahlian->label_teknologi) : ($keahlian->label_teknologi ?? '')) }}" placeholder="ESP32, Arduino, KiCAD" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 {{ $temaAktif['focus'] }} text-slate-800 text-xs outline-hidden transition-colors font-mono">
                            </div>

                            <div class="sm:col-span-2 pt-0.5">
                                <label class="flex items-center gap-2 cursor-pointer text-[11px] text-slate-700 font-bold select-none p-1.5 rounded-lg bg-slate-50 border border-slate-200 hover:bg-slate-100 transition-colors">
                                    <input type="checkbox" name="status_aktif" value="1" {{ old('status_aktif', $keahlian->status_aktif ?? true) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900 h-3.5 w-3.5">
                                    <span>Aktifkan dan tampilkan di slider portofolio website</span>
                                </label>
                            </div>
                        </div>

                    </div>

                <div class="flex items-center justify-end gap-2 pt-1">
                    <a href="{{ route('admin.keahlian.indeks') }}" class="px-4 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-racing font-bold text-xs uppercase tracking-wider shadow-2xs hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-floppy-disk text-amber-400 text-xs"></i>
                        <span>{{ $isEdit ? 'Simpan Perubahan' : 'Tambahkan' }}</span>
                    </button>
                </div>

            </form>
        </div>

        <!-- Live Preview Kartu (Kanan) -->
        <div class="lg:col-span-5 sticky top-16">
            <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-3.5 space-y-3">
                    <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full {{ $temaAktif['ping'] }} animate-pulse"></span>
                            <span class="font-racing font-bold text-[11px] text-slate-900 uppercase tracking-wider">Pratinjau Live Kartu</span>
                        </div>
                        <span class="text-[9px] font-racing font-bold px-2 py-0.5 rounded-full border {{ $temaAktif['badge'] }}">INTERAKTIF</span>
                    </div>

                    <!-- Kartu Slider Asli (Proporsional) -->
                    <div class="skill-card w-full bg-white rounded-xl p-3.5 border border-slate-200/90 shadow-sm relative overflow-hidden flex flex-col justify-between transition-all">
                        <!-- Top Gradient Line -->
                        <div id="preview-gradient-line" class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 to-rose-500"></div>

                        <div>
                            <!-- Header Kartu -->
                            <div class="flex items-start justify-between mb-2.5 pt-0.5">
                                <div id="preview-icon-bg" class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-500/10 to-rose-500/10 border border-amber-200 text-amber-600 flex items-center justify-center shadow-2xs">
                                    <i id="preview-icon" class="fa-solid fa-microchip text-xs"></i>
                                </div>
                                <span id="preview-badge" class="text-[8.5px] font-racing font-bold px-2 py-0.5 rounded-full border bg-amber-50 text-amber-700 border-amber-200">
                                    {{ $keahlian->lencana ?? 'KOMPETENSI' }}
                                </span>
                            </div>

                            <!-- Judul & Deskripsi -->
                            <h3 id="preview-title" class="font-bold text-slate-900 text-xs mb-1 transition-colors">
                                {{ $keahlian->judul ?? 'Judul Keahlian' }}
                            </h3>
                            <p id="preview-desc" class="text-[11px] text-slate-500 leading-snug mb-2.5">
                                {{ $keahlian->deskripsi ?? 'Deskripsi ruang lingkup keahlian akan tampil di sini secara dinamis.' }}
                            </p>
                        </div>

                        <!-- Label Teknologi -->
                        <div id="preview-tags" class="flex flex-wrap gap-1 pt-2 border-t border-slate-100 text-[9.5px] font-semibold text-slate-600">
                            <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 font-bold border border-slate-200">Teknologi 1</span>
                            <span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 font-bold border border-slate-200">Teknologi 2</span>
                        </div>
                    </div>

                    <div class="p-2 rounded-lg bg-slate-50 border border-slate-200/80 text-[10px] text-slate-400 text-center leading-tight">
                        Teks di formulir akan langsung disimulasikan pada kartu pratinjau di atas.
                    </div>
                </div>
        </div>

    </div>

</div>

<script>
    const inputJudul = document.getElementById('input-judul');
    const inputLencana = document.getElementById('input-lencana');
    const inputIkon = document.getElementById('input-ikon');
    const selectTema = document.getElementById('select-tema');
    const inputDesc = document.getElementById('input-deskripsi');
    const inputTags = document.getElementById('input-tags');

    const previewTitle = document.getElementById('preview-title');
    const previewBadge = document.getElementById('preview-badge');
    const previewIcon = document.getElementById('preview-icon');
    const previewIconBg = document.getElementById('preview-icon-bg');
    const previewGradLine = document.getElementById('preview-gradient-line');
    const previewDesc = document.getElementById('preview-desc');
    const previewTags = document.getElementById('preview-tags');

    const themeStyles = {
        purple: {
            grad: 'from-purple-500 via-pink-500 to-rose-500',
            iconBg: 'from-purple-500/10 to-rose-500/10 border-purple-200 text-purple-600',
            badge: 'bg-purple-50 text-purple-700 border-purple-200'
        },
        cyan: {
            grad: 'from-cyan-400 via-sky-500 to-blue-500',
            iconBg: 'from-cyan-500/10 to-blue-500/10 border-cyan-200 text-cyan-600',
            badge: 'bg-cyan-50 text-cyan-700 border-cyan-200'
        },
        rose: {
            grad: 'from-rose-500 via-pink-500 to-amber-500',
            iconBg: 'from-rose-500/10 to-amber-500/10 border-rose-200 text-rose-600',
            badge: 'bg-rose-50 text-rose-700 border-rose-200'
        },
        emerald: {
            grad: 'from-emerald-400 via-teal-500 to-cyan-500',
            iconBg: 'from-emerald-500/10 to-teal-500/10 border-emerald-200 text-emerald-600',
            badge: 'bg-emerald-50 text-emerald-700 border-emerald-200'
        },
        amber: {
            grad: 'from-amber-400 via-orange-500 to-amber-600',
            iconBg: 'from-amber-500/10 to-orange-500/10 border-amber-200 text-amber-600',
            badge: 'bg-amber-50 text-amber-700 border-amber-200'
        }
    };

    function updatePreview() {
        if (previewTitle && inputJudul) {
            previewTitle.innerText = inputJudul.value || 'Judul Keahlian';
        }
        if (previewBadge && inputLencana) {
            previewBadge.innerText = inputLencana.value || 'KOMPETENSI';
        }
        if (previewIcon && inputIkon) {
            previewIcon.className = (inputIkon.value || 'fa-solid fa-microchip') + ' text-xs';
        }
        if (previewDesc && inputDesc) {
            previewDesc.innerText = inputDesc.value || 'Deskripsi singkat mengenai keahlian teknis...';
        }

        const currentTheme = selectTema ? selectTema.value : 'amber';
        const style = themeStyles[currentTheme] || themeStyles.amber;

        if (previewGradLine) {
            previewGradLine.className = `absolute top-0 left-0 right-0 h-1 bg-gradient-to-r ${style.grad}`;
        }
        if (previewIconBg) {
            previewIconBg.className = `w-8 h-8 rounded-lg bg-gradient-to-br ${style.iconBg} border flex items-center justify-center shadow-2xs`;
        }
        if (previewBadge) {
            previewBadge.className = `text-[8.5px] font-racing font-bold px-2 py-0.5 rounded-full border ${style.badge}`;
        }

        if (previewTags && inputTags) {
            const raw = inputTags.value.trim();
            if (!raw) {
                previewTags.innerHTML = '<span class="text-[9px] text-slate-400 font-mono">Belum ada label</span>';
            } else {
                const tags = raw.split(',').map(t => t.trim()).filter(t => t.length > 0);
                previewTags.innerHTML = tags.map((tag, idx) => {
                    return `<span class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 font-bold border border-slate-200">${tag}</span>`;
                }).join('');
            }
        }
    }

    [inputJudul, inputLencana, inputIkon, selectTema, inputDesc, inputTags].forEach(el => {
        if (el) {
            el.addEventListener('input', updatePreview);
            el.addEventListener('change', updatePreview);
        }
    });

    updatePreview();
</script>
@endsection
