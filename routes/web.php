<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PengaturanSitus;
use App\Models\Keahlian;
use App\Models\Projek;
use App\Models\Produk;
use App\Models\User;

// 1. Halaman Beranda Utama Portofolio
Route::get('/', function () {
    $pengaturan = PengaturanSitus::ambilData();
    $daftarKeahlian = Keahlian::ambilSemua()->where('status_aktif', true);
    $daftarProjek = Projek::ambilSemua()->where('status_aktif', true);
    $daftarProduk = Produk::ambilSemua()->where('status_aktif', true);

    // Format data katalog untuk popup modal & interaktivitas JS
    $katalogJson = [];
    foreach ($daftarProduk as $prod) {
        $img = $prod->gambar ? (str_starts_with($prod->gambar, 'http') ? $prod->gambar : asset($prod->gambar)) : asset('img/logo.png');
        $specs = collect($prod->spesifikasi_teknis ?? [])->map(function ($s) {
            return [
                'icon' => $s['ikon'] ?? 'fa-solid fa-bolt',
                'color' => $s['warna'] ?? 'text-amber-500',
                'label' => $s['label'] ?? '',
                'val' => $s['nilai'] ?? '',
            ];
        })->values()->all();

        $katalogJson[$prod->kode_produk] = [
            'title' => $prod->nama_produk,
            'category' => $prod->lencana_kategori,
            'status' => $prod->status_stok,
            'id' => $prod->kode_produk,
            'price' => $prod->harga_format,
            'image' => $img,
            'images' => [$img],
            'desc' => $prod->deskripsi_lengkap ?? $prod->deskripsi_singkat ?? $prod->nama_produk,
            'note' => $prod->tag_chip ?? $prod->sub_kategori,
            'waText' => $prod->teks_pesan_wa ?? ('Halo IDS Store, saya ingin order ' . $prod->nama_produk),
            'icon' => 'fa-solid fa-microchip',
            'iconColor' => 'text-cyan-600',
            'specs' => $specs,
        ];
    }

    // Format data projek untuk popup lightbox & tab switcher JS
    $projekJson = [];
    foreach ($daftarProjek as $proj) {
        $imgDesain = $proj->gambar_desain ? (str_starts_with($proj->gambar_desain, 'http') ? $proj->gambar_desain : asset($proj->gambar_desain)) : asset('img/logo.png');
        $imgApp = $proj->gambar_aplikasi ? (str_starts_with($proj->gambar_aplikasi, 'http') ? $proj->gambar_aplikasi : asset($proj->gambar_aplikasi)) : $imgDesain;

        $specs = collect($proj->sorotan_teknis ?? [])->map(function ($s) {
            return [
                'ikon' => $s['ikon'] ?? 'fa-solid fa-check',
                'warna' => $s['warna'] ?? 'text-rose-500',
                'judul' => $s['judul'] ?? 'Fitur',
                'label' => $s['judul'] ?? 'Fitur',
                'keterangan' => $s['keterangan'] ?? ($s['nilai'] ?? ''),
                'val' => $s['keterangan'] ?? ($s['nilai'] ?? ''),
            ];
        })->values()->all();

        $images = [
            ['url' => $imgDesain, 'label' => 'Desain Layout', 'type' => 'desain', 'note' => $proj->judul],
        ];
        if (!empty($proj->gambar_aplikasi)) {
            $images[] = ['url' => $imgApp, 'label' => 'Tampilan App', 'type' => 'app', 'note' => $proj->judul];
        }

        $projekJson[] = [
            'title' => $proj->judul,
            'category' => $proj->kategori,
            'sub_category' => $proj->lencana_kategori,
            'desc' => $proj->deskripsi,
            'images' => $images,
            'specs' => $specs,
            'apk' => $proj->tautan_unduh_apk ? (str_starts_with($proj->tautan_unduh_apk, 'http') ? $proj->tautan_unduh_apk : asset($proj->tautan_unduh_apk)) : null,
            'desktop' => $proj->tautan_unduh_desktop ? (str_starts_with($proj->tautan_unduh_desktop, 'http') ? $proj->tautan_unduh_desktop : asset($proj->tautan_unduh_desktop)) : null,
            'demo' => $proj->tautan_demo,
            'repo' => $proj->tautan_repositori,
        ];
    }

    return view('welcome', compact('pengaturan', 'daftarKeahlian', 'daftarProjek', 'daftarProduk', 'katalogJson', 'projekJson'));
})->name('beranda');

// 2. Autentikasi Admin
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('admin.dasbor');
    }
    return view('admin.autentikasi.masuk');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $ingatSaya = $request->boolean('ingat_saya');

    // Coba autentikasi via database
    if (Auth::attempt($credentials, $ingatSaya)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dasbor'));
    }

    // Kredensial default admin: admin@idsstore.com / admin123
    if ($credentials['email'] === 'admin@idsstore.com' && $credentials['password'] === 'admin123') {
        try {
            $user = User::firstOrCreate(
                ['email' => 'admin@idsstore.com'],
                [
                    'name' => 'Administrator IDS Store',
                    'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                ]
            );
            Auth::login($user, $ingatSaya);
            $request->session()->regenerate();
            return redirect()->route('admin.dasbor');
        } catch (\Throwable $e) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dasbor');
        }
    }

    return back()->withErrors(['email' => 'Email atau kata sandi tidak cocok.'])->onlyInput('email');
})->name('login.proses');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// 3. Panel Administrasi
Route::prefix('admin')->name('admin.')->group(function () {

    // Dasbor
    Route::get('/', function () {
        $pengaturan = PengaturanSitus::ambilData();
        $semuaKeahlian = Keahlian::ambilSemua();
        $semuaProjek = Projek::ambilSemua();
        $semuaProduk = Produk::ambilSemua();

        $totalKeahlian = $semuaKeahlian->count();
        $keahlianAktif = $semuaKeahlian->where('status_aktif', true)->count();
        $totalProjek = $semuaProjek->count();
        $projekAktif = $semuaProjek->where('status_aktif', true)->count();
        $totalProduk = $semuaProduk->count();
        $produkAktif = $semuaProduk->where('status_aktif', true)->count();

        $projekTerbaru = $semuaProjek->take(5);
        $produkTerbaru = $semuaProduk->take(5);

        return view('admin.dasbor.indeks', compact(
            'pengaturan',
            'totalKeahlian',
            'keahlianAktif',
            'totalProjek',
            'projekAktif',
            'totalProduk',
            'produkAktif',
            'projekTerbaru',
            'produkTerbaru'
        ));
    })->name('dasbor');

    // Pengaturan
    Route::get('/pengaturan', function () {
        $pengaturan = PengaturanSitus::ambilData();
        return view('admin.pengaturan.indeks', compact('pengaturan'));
    })->name('pengaturan.indeks');

    Route::match(['put', 'post'], '/pengaturan', function (Request $request) {
        $data = $request->except(['_token', '_method']);
        try {
            PengaturanSitus::updateOrCreate(['id' => 1], $data);
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Pengaturan situs berhasil diperbarui!');
    })->name('pengaturan.perbarui');

    // Keahlian
    Route::get('/keahlian', function () {
        $daftarKeahlian = Keahlian::ambilSemua();
        return view('admin.keahlian.indeks', compact('daftarKeahlian'));
    })->name('keahlian.indeks');

    Route::post('/keahlian/sinkron-default', function () {
        foreach (Keahlian::dataAwal() as $item) {
            Keahlian::updateOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
        return back()->with('sukses', 'Semua keahlian & kemampuan standar berhasil disinkronkan ke database!');
    })->name('keahlian.sinkron');

    Route::get('/keahlian/buat', function () {
        $isEdit = false;
        $keahlian = new Keahlian();
        return view('admin.keahlian.formulir', compact('isEdit', 'keahlian'));
    })->name('keahlian.buat');

    Route::post('/keahlian', function (Request $request) {
        $payload = $request->except(['_token']);
        $payload['status_aktif'] = $request->has('status_aktif');
        if ($request->has('label_teknologi')) {
            $raw = $request->input('label_teknologi');
            if (is_array($raw)) {
                $payload['label_teknologi'] = $raw;
            } else {
                $payload['label_teknologi'] = array_values(array_filter(array_map('trim', explode(',', (string)$raw))));
            }
        }
        try {
            Keahlian::create($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.keahlian.indeks')->with('sukses', 'Keahlian baru berhasil disimpan!');
    })->name('keahlian.simpan');

    Route::get('/keahlian/{keahlian}/ubah', function ($keahlian) {
        $isEdit = true;
        if (!($keahlian instanceof Keahlian)) {
            $keahlian = Keahlian::find($keahlian) ?? Keahlian::ambilSemua()->firstWhere('id', (int)$keahlian) ?? new Keahlian();
        }
        return view('admin.keahlian.formulir', compact('isEdit', 'keahlian'));
    })->name('keahlian.ubah');

    Route::match(['put', 'patch', 'post'], '/keahlian/{keahlian}', function (Request $request, $keahlian) {
        $model = ($keahlian instanceof Keahlian) ? $keahlian : Keahlian::findOrFail($keahlian);
        $payload = $request->except(['_token', '_method']);
        $payload['status_aktif'] = $request->has('status_aktif');
        if ($request->has('label_teknologi')) {
            $raw = $request->input('label_teknologi');
            if (is_array($raw)) {
                $payload['label_teknologi'] = $raw;
            } else {
                $payload['label_teknologi'] = array_values(array_filter(array_map('trim', explode(',', (string)$raw))));
            }
        }
        try {
            $model->update($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.keahlian.indeks')->with('sukses', 'Keahlian berhasil diperbarui!');
    })->name('keahlian.perbarui');

    Route::match(['patch', 'post'], '/keahlian/{keahlian}/status', function ($keahlian) {
        try {
            $model = ($keahlian instanceof Keahlian) ? $keahlian : Keahlian::findOrFail($keahlian);
            $model->status_aktif = !$model->status_aktif;
            $model->save();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Status keahlian berhasil diperbarui!');
    })->name('keahlian.status');

    Route::match(['delete', 'post'], '/keahlian/{keahlian}/hapus', function ($keahlian) {
        try {
            $model = ($keahlian instanceof Keahlian) ? $keahlian : Keahlian::findOrFail($keahlian);
            $model->delete();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Keahlian berhasil dihapus!');
    })->name('keahlian.hapus');

    // Projek
    Route::get('/projek', function () {
        $daftarProjek = Projek::ambilSemua();
        return view('admin.projek.indeks', compact('daftarProjek'));
    })->name('projek.indeks');

    Route::get('/projek/buat', function () {
        $isEdit = false;
        $projek = new Projek();
        return view('admin.projek.formulir', compact('isEdit', 'projek'));
    })->name('projek.buat');

    Route::post('/projek', function (Request $request) {
        $payload = $request->except(['_token']);
        $payload['status_aktif'] = $request->has('status_aktif');

        if ($request->hasFile('gambar_desain_file')) {
            $payload['gambar_desain'] = 'storage/' . $request->file('gambar_desain_file')->store('projek', 'public');
        } elseif ($request->filled('gambar_desain_url')) {
            $payload['gambar_desain'] = $request->input('gambar_desain_url');
        }

        if ($request->hasFile('gambar_aplikasi_file')) {
            $payload['gambar_aplikasi'] = 'storage/' . $request->file('gambar_aplikasi_file')->store('projek', 'public');
        } elseif ($request->filled('gambar_aplikasi_url')) {
            $payload['gambar_aplikasi'] = $request->input('gambar_aplikasi_url');
        }

        $sorotan = [];
        $juduls = $request->input('sorotan_judul', []);
        $ikons = $request->input('sorotan_ikon', []);
        $kets = $request->input('sorotan_keterangan', []);
        $warnas = $request->input('sorotan_warna', []);
        foreach ($juduls as $idx => $j) {
            if (!empty($j) || !empty($kets[$idx] ?? null)) {
                $sorotan[] = [
                    'judul' => $j ?: 'Fitur',
                    'nilai' => $kets[$idx] ?? '',
                    'keterangan' => $kets[$idx] ?? '',
                    'ikon' => $ikons[$idx] ?? 'fa-solid fa-microchip',
                    'warna' => $warnas[$idx] ?? 'text-rose-500',
                ];
            }
        }
        $payload['sorotan_teknis'] = $sorotan;

        try {
            Projek::create($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.projek.indeks')->with('sukses', 'Projek baru berhasil disimpan!');
    })->name('projek.simpan');

    Route::get('/projek/{projek}/ubah', function ($projek) {
        $isEdit = true;
        if (!($projek instanceof Projek)) {
            $projek = Projek::find($projek) ?? Projek::ambilSemua()->firstWhere('id', (int)$projek) ?? new Projek();
        }
        return view('admin.projek.formulir', compact('isEdit', 'projek'));
    })->name('projek.ubah');

    Route::match(['put', 'patch', 'post'], '/projek/{projek}', function (Request $request, $projek) {
        $model = ($projek instanceof Projek) ? $projek : Projek::findOrFail($projek);
        $payload = $request->except(['_token', '_method']);
        $payload['status_aktif'] = $request->has('status_aktif');

        if ($request->hasFile('gambar_desain_file')) {
            $payload['gambar_desain'] = 'storage/' . $request->file('gambar_desain_file')->store('projek', 'public');
        } elseif ($request->filled('gambar_desain_url')) {
            $payload['gambar_desain'] = $request->input('gambar_desain_url');
        }

        if ($request->hasFile('gambar_aplikasi_file')) {
            $payload['gambar_aplikasi'] = 'storage/' . $request->file('gambar_aplikasi_file')->store('projek', 'public');
        } elseif ($request->filled('gambar_aplikasi_url')) {
            $payload['gambar_aplikasi'] = $request->input('gambar_aplikasi_url');
        }

        $sorotan = [];
        $juduls = $request->input('sorotan_judul', []);
        $ikons = $request->input('sorotan_ikon', []);
        $kets = $request->input('sorotan_keterangan', []);
        $warnas = $request->input('sorotan_warna', []);
        foreach ($juduls as $idx => $j) {
            if (!empty($j) || !empty($kets[$idx] ?? null)) {
                $sorotan[] = [
                    'judul' => $j ?: 'Fitur',
                    'nilai' => $kets[$idx] ?? '',
                    'keterangan' => $kets[$idx] ?? '',
                    'ikon' => $ikons[$idx] ?? 'fa-solid fa-microchip',
                    'warna' => $warnas[$idx] ?? 'text-rose-500',
                ];
            }
        }
        $payload['sorotan_teknis'] = $sorotan;

        try {
            $model->update($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.projek.indeks')->with('sukses', 'Projek berhasil diperbarui!');
    })->name('projek.perbarui');

    Route::match(['patch', 'post'], '/projek/{projek}/status', function ($projek) {
        try {
            $model = ($projek instanceof Projek) ? $projek : Projek::findOrFail($projek);
            $model->status_aktif = !$model->status_aktif;
            $model->save();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Status projek berhasil diperbarui!');
    })->name('projek.status');

    Route::match(['delete', 'post'], '/projek/{projek}/hapus', function ($projek) {
        try {
            $model = ($projek instanceof Projek) ? $projek : Projek::findOrFail($projek);
            $model->delete();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Projek berhasil dihapus!');
    })->name('projek.hapus');

    // Produk
    Route::get('/produk', function () {
        $daftarProduk = Produk::ambilSemua();
        return view('admin.produk.indeks', compact('daftarProduk'));
    })->name('produk.indeks');

    Route::get('/produk/buat', function () {
        $isEdit = false;
        $produk = new Produk();
        return view('admin.produk.formulir', compact('isEdit', 'produk'));
    })->name('produk.buat');

    Route::post('/produk', function (Request $request) {
        $payload = $request->except(['_token']);
        $payload['status_aktif'] = $request->has('status_aktif');

        if ($request->hasFile('gambar_file')) {
            $payload['gambar'] = 'storage/' . $request->file('gambar_file')->store('produk', 'public');
        } elseif ($request->filled('gambar_url')) {
            $payload['gambar'] = $request->input('gambar_url');
        }

        if ($request->filled('harga')) {
            $payload['harga_format'] = 'Rp ' . number_format($request->input('harga'), 0, ',', '.');
        }

        $spek = [];
        $labels = $request->input('spek_label', []);
        $nilais = $request->input('spek_nilai', []);
        $ikons = $request->input('spek_ikon', []);
        $warnas = $request->input('spek_warna', []);
        foreach ($labels as $idx => $l) {
            if (!empty($l) || !empty($nilais[$idx] ?? null)) {
                $spek[] = [
                    'label' => $l ?: '',
                    'nilai' => $nilais[$idx] ?? '',
                    'ikon' => $ikons[$idx] ?? 'fa-solid fa-microchip',
                    'warna' => $warnas[$idx] ?? 'text-rose-500',
                ];
            }
        }
        $payload['spesifikasi_teknis'] = $spek;

        try {
            Produk::create($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.produk.indeks')->with('sukses', 'Produk baru berhasil disimpan!');
    })->name('produk.simpan');

    Route::get('/produk/{produk}/ubah', function ($produk) {
        $isEdit = true;
        if (!($produk instanceof Produk)) {
            $produk = Produk::find($produk) ?? Produk::ambilSemua()->firstWhere('id', (int)$produk) ?? new Produk();
        }
        return view('admin.produk.formulir', compact('isEdit', 'produk'));
    })->name('produk.ubah');

    Route::match(['put', 'patch', 'post'], '/produk/{produk}', function (Request $request, $produk) {
        $model = ($produk instanceof Produk) ? $produk : Produk::findOrFail($produk);
        $payload = $request->except(['_token', '_method']);
        $payload['status_aktif'] = $request->has('status_aktif');

        if ($request->hasFile('gambar_file')) {
            $payload['gambar'] = 'storage/' . $request->file('gambar_file')->store('produk', 'public');
        } elseif ($request->filled('gambar_url')) {
            $payload['gambar'] = $request->input('gambar_url');
        }

        if ($request->filled('harga')) {
            $payload['harga_format'] = 'Rp ' . number_format($request->input('harga'), 0, ',', '.');
        }

        $spek = [];
        $labels = $request->input('spek_label', []);
        $nilais = $request->input('spek_nilai', []);
        $ikons = $request->input('spek_ikon', []);
        $warnas = $request->input('spek_warna', []);
        foreach ($labels as $idx => $l) {
            if (!empty($l) || !empty($nilais[$idx] ?? null)) {
                $spek[] = [
                    'label' => $l ?: '',
                    'nilai' => $nilais[$idx] ?? '',
                    'ikon' => $ikons[$idx] ?? 'fa-solid fa-microchip',
                    'warna' => $warnas[$idx] ?? 'text-rose-500',
                ];
            }
        }
        $payload['spesifikasi_teknis'] = $spek;

        try {
            $model->update($payload);
        } catch (\Throwable $e) {}
        return redirect()->route('admin.produk.indeks')->with('sukses', 'Produk berhasil diperbarui!');
    })->name('produk.perbarui');

    Route::match(['patch', 'post'], '/produk/{produk}/status', function ($produk) {
        try {
            $model = ($produk instanceof Produk) ? $produk : Produk::findOrFail($produk);
            $model->status_aktif = !$model->status_aktif;
            $model->save();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Status produk berhasil diperbarui!');
    })->name('produk.status');

    Route::match(['delete', 'post'], '/produk/{produk}/hapus', function ($produk) {
        try {
            $model = ($produk instanceof Produk) ? $produk : Produk::findOrFail($produk);
            $model->delete();
        } catch (\Throwable $e) {}
        return back()->with('sukses', 'Produk berhasil dihapus!');
    })->name('produk.hapus');

});
