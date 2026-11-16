<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'keahlian';
    protected $guarded = [];

    protected $casts = [
        'label_teknologi' => 'array',
        'status_aktif' => 'boolean',
    ];

    public static function dataAwal(): array
    {
        return [
            [
                'judul' => 'Desain Skematik & Layout PCB',
                'kategori' => 'Hardware',
                'lencana' => 'MULTI-LAYER PCB',
                'ikon' => 'fa-solid fa-microchip',
                'warna_tema' => 'amber',
                'deskripsi' => 'Perancangan skematik dan routing jalur PCB presisi 2-layer menggunakan KiCAD dan EasyEDA, kalkulasi jejak daya, fabrikasi file Gerber dan perakitan SMD.',
                'label_teknologi' => ['KiCAD', 'EasyEDA', 'Gerber', 'SMD Assembly'],
                'urutan' => 1,
                'status_aktif' => true,
            ],
            [
                'judul' => 'Firmware IoT & Embedded Systems',
                'kategori' => 'IoT',
                'lencana' => 'REAL-TIME IOT',
                'ikon' => 'fa-solid fa-wifi',
                'warna_tema' => 'rose',
                'deskripsi' => 'Pemrograman mikrokontroler ESP32, ESP8266, STM32 berbasis C++, FreeRTOS multitasking, protokol MQTT broker, WebSockets, dan telemetri sensor presisi.',
                'label_teknologi' => ['ESP32', 'C/C++', 'FreeRTOS', 'MQTT', 'WebSockets'],
                'urutan' => 2,
                'status_aktif' => true,
            ],
            [
                'judul' => 'Fullstack Web Development (Laravel)',
                'kategori' => 'Web',
                'lencana' => 'TURBO PHP',
                'ikon' => 'fa-solid fa-code',
                'warna_tema' => 'cyan',
                'deskripsi' => 'Arsitektur backend Laravel 11 berkinerja tinggi, Blade modular engine, RESTful API terintegrasi telemetry hardware, dan tuning database MySQL.',
                'label_teknologi' => ['Laravel 11', 'PHP 8.x', 'TailwindCSS', 'MySQL', 'REST API'],
                'urutan' => 3,
                'status_aktif' => true,
            ],
            [
                'judul' => 'Aplikasi Mobile & Desktop (Flutter)',
                'kategori' => 'Mobile',
                'lencana' => 'CROSS-PLATFORM',
                'ikon' => 'fa-solid fa-mobile-screen',
                'warna_tema' => 'emerald',
                'deskripsi' => 'Pengembangan antarmuka pengendali perangkat nirkabel via Bluetooth Low Energy (BLE), USB Serial UART, dan live monitoring grafik data telemetri.',
                'label_teknologi' => ['Flutter', 'Dart', 'BLE Bluetooth', 'Windows Desktop', 'Android'],
                'urutan' => 4,
                'status_aktif' => true,
            ],
            [
                'judul' => 'Hardware Prototyping & Stress Test',
                'kategori' => 'Hardware',
                'lencana' => 'PRECISION FAB',
                'ikon' => 'fa-solid fa-screwdriver-wrench',
                'warna_tema' => 'purple',
                'deskripsi' => 'Perakitan komponen elektronika presisi SMD/THT, pengujian beban nyata dengan power bench supply, kalibrasi tegangan ADC, dan proteksi termal OVP/OCP.',
                'label_teknologi' => ['Soldering SMD/THT', 'Bench PSU', 'Kalibrasi ADC', 'QC Test'],
                'urutan' => 5,
                'status_aktif' => true,
            ],
        ];
    }

    public static function ambilSemua()
    {
        try {
            static::bersihkanDuplikat();

            $data = static::orderBy('urutan', 'asc')->get();
            if ($data->isNotEmpty()) {
                return $data;
            }

            // Hanya buat data awal jika tabel database benar-benar kosong
            foreach (static::dataAwal() as $item) {
                static::create($item);
            }

            return static::orderBy('urutan', 'asc')->get();
        } catch (\Throwable $e) {
            $list = collect();
            foreach (static::dataAwal() as $idx => $item) {
                $m = new static($item);
                $m->id = $idx + 1;
                $m->exists = true;
                $list->push($m);
            }
            return $list;
        }
    }

    public static function bersihkanDuplikat()
    {
        try {
            // Cari dan hapus duplikat dengan judul sama persis (simpan yang ID terkecil)
            $duplikats = static::select('judul')
                ->groupBy('judul')
                ->havingRaw('COUNT(*) > 1')
                ->pluck('judul');

            foreach ($duplikats as $judul) {
                $ids = static::where('judul', $judul)->orderBy('id', 'asc')->pluck('id');
                if ($ids->count() > 1) {
                    static::whereIn('id', $ids->slice(1))->delete();
                }
            }

            // Hapus versi lama jika versi barunya sudah ada di database
            if (static::where('judul', 'Fullstack Web Development (Laravel)')->exists()) {
                static::where('judul', 'Fullstack Web Laravel & Tailwind')->delete();
            }
            if (static::where('judul', 'Aplikasi Mobile & Desktop (Flutter)')->exists()) {
                static::where('judul', 'Aplikasi Mobile & Desktop Flutter')->delete();
            }
        } catch (\Throwable $e) {}
    }
}
