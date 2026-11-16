<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanSitus extends Model
{
    protected $table = 'pengaturan_situs';
    protected $guarded = [];

    public static function ambilData()
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('pengaturan_situs')) {
                if (!\Illuminate\Support\Facades\Schema::hasColumn('pengaturan_situs', 'foto_profil')) {
                    \Illuminate\Support\Facades\Schema::table('pengaturan_situs', function (\Illuminate\Database\Schema\Blueprint $table) {
                        $table->string('foto_profil')->nullable()->after('deskripsi_profil');
                    });
                }
                if (!\Illuminate\Support\Facades\Schema::hasColumn('pengaturan_situs', 'logo')) {
                    \Illuminate\Support\Facades\Schema::table('pengaturan_situs', function (\Illuminate\Database\Schema\Blueprint $table) {
                        $table->string('logo')->nullable()->after('nama_toko');
                    });
                }
            }

            $data = static::first();
            if ($data) {
                return $data;
            }

            return static::create([
                'nama_toko' => 'IDS STORE TECHNOLOGY',
                'logo' => 'img/logo.png',
                'nama_lengkap' => 'Nurhadi',
                'foto_profil' => 'img/logo.png',
                'warna_aksen' => 'racing',
                'judul_hero' => 'Halo, Saya Nurhadi',
                'tagline' => 'Pengembang IoT, Hardware, Laravel & Flutter',
                'deskripsi_profil' => 'Pengembang sistem perangkat keras elektronika presisi (PCB Design, ESP32 firmware) dan fullstack web architecture Laravel dengan performa tinggi.',
                'nomor_whatsapp' => '6281234567890',
                'email' => 'nurhadi.dev@idsstore.com',
                'tautan_toko' => '#store',
                'tautan_github' => 'https://github.com/nh-hadi',
                'tautan_linkedin' => 'https://linkedin.com',
            ]);
        } catch (\Throwable $e) {
            $model = new static([
                'nama_toko' => 'IDS STORE TECHNOLOGY',
                'logo' => 'img/logo.png',
                'nama_lengkap' => 'Nurhadi',
                'foto_profil' => 'img/logo.png',
                'warna_aksen' => 'racing',
                'judul_hero' => 'Halo, Saya Nurhadi',
                'tagline' => 'Pengembang IoT, Hardware, Laravel & Flutter',
                'deskripsi_profil' => 'Pengembang sistem perangkat keras elektronika presisi (PCB Design, ESP32 firmware) dan fullstack web architecture Laravel dengan performa tinggi.',
                'nomor_whatsapp' => '6281234567890',
                'email' => 'nurhadi.dev@idsstore.com',
                'tautan_toko' => '#store',
                'tautan_github' => 'https://github.com/nh-hadi',
                'tautan_linkedin' => 'https://linkedin.com',
            ]);
            $model->id = 1;
            $model->exists = true;
            return $model;
        }
    }

    /**
     * Mengembalikan array karakter dengan kelas warna individual per huruf sesuai tema aktif
     */
    public function namaPerHuruf(string $style = 'hero'): array
    {
        $nama = $this->nama_lengkap ?? 'Nurhadi';
        $aksen = $this->warna_aksen ?? 'racing';

        $paletWarna = match ($aksen) {
            'cyan' => [
                'text-cyan-600',
                'text-sky-500',
                'text-blue-600',
                'text-indigo-600',
                'text-teal-500',
            ],
            'emerald' => [
                'text-emerald-600',
                'text-teal-500',
                'text-cyan-600',
                'text-green-600',
                'text-emerald-500',
            ],
            'rose' => [
                'text-rose-600',
                'text-pink-600',
                'text-red-600',
                'text-rose-500',
                'text-pink-500',
            ],
            'amber' => [
                'text-amber-500',
                'text-orange-500',
                'text-amber-600',
                'text-orange-600',
                'text-yellow-500',
            ],
            default => [
                'text-amber-500',
                'text-rose-600',
                'text-purple-600',
                'text-cyan-600',
                'text-blue-600',
                'text-emerald-500',
            ],
        };

        $hurufArray = mb_str_split($nama);
        $hasil = [];
        $warnaCount = count($paletWarna);

        foreach ($hurufArray as $idx => $char) {
            if ($char === ' ') {
                $hasil[] = ['char' => '&nbsp;', 'color' => ''];
            } else {
                $hasil[] = [
                    'char' => $char,
                    'color' => $paletWarna[$idx % $warnaCount],
                ];
            }
        }

        return $hasil;
    }

    /**
     * Mengembalikan seluruh token visual dan warna tema yang aktif
     */
    public function temaTokens(): array
    {
        $aksen = $this->warna_aksen ?? 'racing';

        return match ($aksen) {
            'cyan' => [
                'key' => 'cyan',
                'nama' => 'Cyan & Sky Blue',
                'border' => 'from-cyan-400 via-sky-500 via-indigo-500 via-blue-500 to-cyan-400',
                'gradient' => 'from-cyan-400 via-sky-500 to-blue-600',
                'text_gradient' => 'from-cyan-600 via-sky-600 to-blue-600',
                'btn' => 'from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white',
                'btn_shadow' => 'shadow-cyan-500/20',
                'badge' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                'icon' => 'text-cyan-500',
                'active_nav_icon' => 'text-cyan-400',
                'ping' => 'bg-cyan-500',
                'focus' => 'focus:border-cyan-500 focus:ring-cyan-500',
                'glow1' => 'bg-cyan-400/20',
                'glow2' => 'bg-sky-400/20',
                'glow3' => 'bg-blue-400/15',
                'card1' => 'from-cyan-400 to-sky-500',
                'card2' => 'from-sky-400 to-blue-600',
                'card3' => 'from-cyan-400 via-teal-400 to-sky-500',
                'card4' => 'from-blue-500 to-indigo-600',
                'table_border' => 'from-cyan-400 via-sky-500 via-indigo-500 to-cyan-400',
            ],
            'emerald' => [
                'key' => 'emerald',
                'nama' => 'Emerald & Teal',
                'border' => 'from-emerald-400 via-teal-500 via-cyan-500 via-green-500 to-emerald-400',
                'gradient' => 'from-emerald-400 via-teal-500 to-cyan-500',
                'text_gradient' => 'from-emerald-600 via-teal-600 to-cyan-600',
                'btn' => 'from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white',
                'btn_shadow' => 'shadow-emerald-500/20',
                'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                'icon' => 'text-emerald-500',
                'active_nav_icon' => 'text-emerald-400',
                'ping' => 'bg-emerald-500',
                'focus' => 'focus:border-emerald-500 focus:ring-emerald-500',
                'glow1' => 'bg-emerald-400/20',
                'glow2' => 'bg-teal-400/20',
                'glow3' => 'bg-cyan-400/15',
                'card1' => 'from-emerald-400 to-teal-500',
                'card2' => 'from-teal-400 to-cyan-500',
                'card3' => 'from-emerald-400 via-green-400 to-teal-500',
                'card4' => 'from-teal-600 to-emerald-700',
                'table_border' => 'from-emerald-400 via-teal-500 via-cyan-500 to-emerald-400',
            ],
            'rose' => [
                'key' => 'rose',
                'nama' => 'Rose & Crimson',
                'border' => 'from-rose-500 via-pink-500 via-red-500 via-amber-400 to-rose-500',
                'gradient' => 'from-rose-500 via-pink-500 to-red-500',
                'text_gradient' => 'from-rose-600 via-pink-600 to-red-600',
                'btn' => 'from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 text-white',
                'btn_shadow' => 'shadow-rose-500/20',
                'badge' => 'bg-rose-50 text-rose-700 border-rose-200',
                'icon' => 'text-rose-500',
                'active_nav_icon' => 'text-rose-400',
                'ping' => 'bg-rose-500',
                'focus' => 'focus:border-rose-500 focus:ring-rose-500',
                'glow1' => 'bg-rose-400/20',
                'glow2' => 'bg-pink-400/20',
                'glow3' => 'bg-red-400/15',
                'card1' => 'from-rose-500 to-pink-500',
                'card2' => 'from-pink-500 to-red-500',
                'card3' => 'from-rose-500 via-purple-500 to-pink-500',
                'card4' => 'from-red-500 to-rose-600',
                'table_border' => 'from-rose-500 via-pink-500 via-red-500 to-rose-500',
            ],
            'amber' => [
                'key' => 'amber',
                'nama' => 'Amber & Gold',
                'border' => 'from-amber-400 via-orange-500 via-red-500 via-yellow-400 to-amber-400',
                'gradient' => 'from-amber-400 via-orange-500 to-amber-600',
                'text_gradient' => 'from-amber-600 via-orange-600 to-red-600',
                'btn' => 'from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white',
                'btn_shadow' => 'shadow-amber-500/20',
                'badge' => 'bg-amber-50 text-amber-700 border-amber-200',
                'icon' => 'text-amber-500',
                'active_nav_icon' => 'text-amber-400',
                'ping' => 'bg-amber-500',
                'focus' => 'focus:border-amber-500 focus:ring-amber-500',
                'glow1' => 'bg-amber-400/20',
                'glow2' => 'bg-orange-400/20',
                'glow3' => 'bg-yellow-400/15',
                'card1' => 'from-amber-400 to-orange-500',
                'card2' => 'from-orange-500 to-red-500',
                'card3' => 'from-amber-400 via-yellow-400 to-orange-500',
                'card4' => 'from-orange-600 to-amber-700',
                'table_border' => 'from-amber-400 via-orange-500 via-red-500 to-amber-400',
            ],
            default => [
                'key' => 'racing',
                'nama' => 'Racing Multi-Color',
                'border' => 'from-amber-400 via-rose-500 via-purple-500 via-cyan-400 to-amber-400',
                'gradient' => 'from-amber-400 via-rose-500 to-cyan-500',
                'text_gradient' => 'from-rose-600 via-purple-600 to-cyan-600',
                'btn' => 'from-rose-500 to-amber-500 hover:from-rose-600 hover:to-amber-600 text-white',
                'btn_shadow' => 'shadow-rose-500/20',
                'badge' => 'bg-rose-50 text-rose-700 border-rose-200',
                'icon' => 'text-rose-500',
                'active_nav_icon' => 'text-amber-400',
                'ping' => 'bg-rose-500',
                'focus' => 'focus:border-rose-500 focus:ring-rose-500',
                'glow1' => 'bg-rose-400/15',
                'glow2' => 'bg-cyan-400/15',
                'glow3' => 'bg-amber-400/15',
                'card1' => 'from-amber-400 via-orange-500 to-rose-500',
                'card2' => 'from-rose-500 via-pink-500 to-purple-500',
                'card3' => 'from-cyan-400 via-sky-500 to-blue-600',
                'card4' => 'from-emerald-400 via-teal-500 to-cyan-500',
                'table_border' => 'from-amber-400 via-rose-500 via-purple-500 to-cyan-400',
            ],
        };
    }
}
