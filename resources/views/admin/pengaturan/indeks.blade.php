@extends('admin.tata_letak.utama')

@section('judul', 'Pengaturan Situs & Profil')
@section('halaman_judul', 'Pengaturan Situs & Profil')
@section('halaman_subjudul', 'Kelola informasi profil Nurhadi, tema warna website, hero banner, WhatsApp resmi, dan media sosial')

@section('konten')
<div class="space-y-4 w-full">
    <form action="{{ route('admin.pengaturan.perbarui') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @php
            $aksenAktif = old('warna_aksen', $pengaturan->warna_aksen ?? 'racing');
            $daftarTema = [
                [
                    'id' => 'racing',
                    'nama' => 'Racing Multi-Color',
                    'deskripsi' => 'Gradient Amber, Rose & Cyan',
                    'gradient' => 'from-amber-400 via-rose-500 to-cyan-400',
                    'badge' => 'Default',
                ],
                [
                    'id' => 'cyan',
                    'nama' => 'Cyan & Sky Blue',
                    'deskripsi' => 'Nuansa toska & cyber tech',
                    'gradient' => 'from-cyan-400 via-sky-500 to-blue-600',
                    'badge' => 'Cyber Tech',
                ],
                [
                    'id' => 'emerald',
                    'nama' => 'Emerald & Teal',
                    'deskripsi' => 'Nuansa hijau zamrud clean',
                    'gradient' => 'from-emerald-400 via-teal-500 to-cyan-500',
                    'badge' => 'Eco',
                ],
                [
                    'id' => 'rose',
                    'nama' => 'Rose & Crimson',
                    'deskripsi' => 'Nuansa merah muda elegan',
                    'gradient' => 'from-rose-500 via-pink-500 to-red-500',
                    'badge' => 'Speed',
                ],
                [
                    'id' => 'amber',
                    'nama' => 'Amber & Gold',
                    'deskripsi' => 'Nuansa kuning keemasan',
                    'gradient' => 'from-amber-400 via-orange-500 to-amber-600',
                    'badge' => 'Solar',
                ],
            ];
        @endphp

        @php
            $temaTokenAktif = ($pengaturan ?? \App\Models\PengaturanSitus::ambilData())->temaTokens();
        @endphp

        <!-- Bagian 1: Pilihan Tema Warna Website & Admin (Compact) -->
        <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-4 sm:p-5 space-y-3">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-2 border-b border-slate-100 gap-1.5">
                <div class="flex items-center gap-2">
                    <div class="w-6 h-6 rounded-md bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <div>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Tema & Warna Aksen Website</h3>
                        <p class="text-[10px] text-slate-400">Pilih tema visual yang akan aktif di seluruh halaman publik dan admin</p>
                    </div>
                </div>
                <span class="text-[9px] font-racing font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 border border-slate-200 self-start sm:self-auto">
                    Aktif: {{ strtoupper($aksenAktif) }}
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-2.5">
                @foreach($daftarTema as $tema)
                    <label class="relative flex flex-col p-2.5 rounded-lg border-2 transition-all cursor-pointer select-none hover:shadow-2xs {{ $aksenAktif === $tema['id'] ? 'border-[#2a2185] bg-slate-50/90 shadow-2xs' : 'border-slate-200 bg-white hover:border-slate-300' }}">
                        <div class="flex items-center justify-between mb-1.5">
                            <span class="text-[11px] font-extrabold text-slate-900 font-racing tracking-wide flex items-center gap-1.5">
                                <span class="w-2 h-2 rounded-full bg-gradient-to-r {{ $tema['gradient'] }}"></span>
                                <span>{{ $tema['nama'] }}</span>
                            </span>
                            <input type="radio" name="warna_aksen" value="{{ $tema['id'] }}" {{ $aksenAktif === $tema['id'] ? 'checked' : '' }} class="h-3.5 w-3.5 text-[#2a2185] focus:ring-[#2a2185] border-slate-300 cursor-pointer">
                        </div>

                        <!-- Bar Gradient Preview -->
                        <div class="w-full h-2 rounded-full bg-gradient-to-r {{ $tema['gradient'] }} my-1.5 shadow-2xs"></div>

                        <p class="text-[10px] text-slate-500 leading-tight mb-2">{{ $tema['deskripsi'] }}</p>

                        <div class="mt-auto flex items-center justify-between pt-1.5 border-t border-slate-100">
                            <span class="text-[8.5px] font-bold text-slate-400 uppercase font-racing">{{ $tema['badge'] }}</span>
                            @if($aksenAktif === $tema['id'])
                                <span class="text-[8.5px] font-bold text-emerald-600 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i> Terpilih
                                </span>
                            @endif
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- 2 Kolom: Profil & Kontak -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <!-- Bagian 2: Profil & Identitas -->
            <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-4 sm:p-5 space-y-3">
                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                    <div class="w-6 h-6 rounded-md bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>
                    <div>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Identitas & Profil Utama</h3>
                        <p class="text-[10px] text-slate-400">Informasi nama, bio, dan hero headline</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pengaturan->nama_lengkap ?? 'Nurhadi') }}" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-bold">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Judul Hero Banner</label>
                        <input type="text" name="judul_hero" value="{{ old('judul_hero', $pengaturan->judul_hero ?? 'Halo, Saya Nurhadi') }}" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-medium">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Tagline Keahlian</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $pengaturan->tagline ?? 'Pengembang IoT, Hardware, Laravel & Flutter') }}" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-medium">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Deskripsi / Bio Profil Lengkap</label>
                        <textarea name="deskripsi_profil" rows="3" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden leading-relaxed transition-colors font-medium">{{ old('deskripsi_profil', $pengaturan->deskripsi_profil ?? '') }}</textarea>
                        <p class="text-[9.5px] text-slate-400 mt-0.5">Paragraf bio pengantar pada hero section halaman utama.</p>
                    </div>
                </div>
            </div>

            <!-- Bagian 3: Kontak & Toko Resmi -->
            <div class="bg-white rounded-xl border border-slate-200/90 shadow-2xs p-4 sm:p-5 space-y-3">
                <div class="flex items-center gap-2 pb-2 border-b border-slate-100">
                    <div class="w-6 h-6 rounded-md bg-slate-50 border border-slate-200 text-[#2a2185] flex items-center justify-center text-xs shadow-2xs">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div>
                        <h3 class="font-racing font-bold text-xs uppercase tracking-wider text-slate-900">Toko Resmi & Kontak WhatsApp</h3>
                        <p class="text-[10px] text-slate-400">Identitas toko, tautan media sosial, dan kontak</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Nama Toko</label>
                        <input type="text" name="nama_toko" value="{{ old('nama_toko', $pengaturan->nama_toko ?? 'IDS STORE TECHNOLOGY') }}" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-bold uppercase font-racing">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">WhatsApp (Format: 628xxx)</label>
                        <input type="text" name="nomor_whatsapp" value="{{ old('nomor_whatsapp', $pengaturan->nomor_whatsapp ?? '6281234567890') }}" required class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs font-mono font-bold outline-hidden transition-colors">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Email Kontak</label>
                        <input type="email" name="email" value="{{ old('email', $pengaturan->email ?? '') }}" placeholder="email@idsstore.com" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Tautan Toko (#store / URL)</label>
                        <input type="text" name="tautan_toko" value="{{ old('tautan_toko', $pengaturan->tautan_toko ?? '#store') }}" class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors font-mono">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Tautan GitHub</label>
                        <input type="url" name="tautan_github" value="{{ old('tautan_github', $pengaturan->tautan_github ?? '') }}" placeholder="https://github.com/..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                    </div>

                    <div>
                        <label class="text-[10.5px] font-bold text-slate-700 uppercase tracking-wider mb-1 block">Tautan LinkedIn</label>
                        <input type="url" name="tautan_linkedin" value="{{ old('tautan_linkedin', $pengaturan->tautan_linkedin ?? '') }}" placeholder="https://linkedin.com/..." class="w-full px-3 py-1.5 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white text-slate-800 text-xs outline-hidden transition-colors">
                    </div>
                </div>
            </div>

        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-end gap-2 pt-1">
            <button type="submit" class="px-5 py-2 rounded-lg bg-[#2a2185] hover:bg-[#3a31a5] text-white font-racing font-bold text-xs uppercase tracking-wider shadow-xs hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-1.5 cursor-pointer">
                <i class="fa-solid fa-floppy-disk text-white text-xs"></i>
                <span>Simpan Pengaturan</span>
            </button>
        </div>

    </form>
</div>
@endsection
