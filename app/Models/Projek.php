<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    protected $table = 'projek';
    protected $guarded = [];

    protected $casts = [
        'sorotan_teknis' => 'array',
        'status_aktif' => 'boolean',
    ];

    public static function dataAwal(): array
    {
        return [
            [
                'judul' => 'Smart Digital PSU V1.0.2',
                'kategori' => 'Hardware',
                'lencana_kategori' => 'PROTOTYPE HARDWARE',
                'subjudul_lencana' => 'ESP-12F IoT / SMPS POWER',
                'urutan' => 1,
                'deskripsi' => 'Catu daya digital presisi terintegrasi dengan proteksi OVP/OCP, kalibrasi digital, serta dashboard kontrol nirkabel.',
                'gambar_desain' => 'img/logo.png',
                'gambar_aplikasi' => 'img/logo.png',
                'berkas_unduhan' => null,
                'status_aktif' => true,
                'sorotan_teknis' => [
                    ['judul' => 'Output', 'nilai' => '0-30V / 5A Presisi', 'ikon' => 'fa-solid fa-bolt', 'warna' => 'text-amber-500'],
                    ['judul' => 'Kendali', 'nilai' => 'ESP-12F Wi-Fi Telemetry', 'ikon' => 'fa-solid fa-wifi', 'warna' => 'text-cyan-500'],
                    ['judul' => 'Proteksi', 'nilai' => 'OVP, OCP & Thermal Cut', 'ikon' => 'fa-solid fa-shield-halved', 'warna' => 'text-emerald-500'],
                    ['judul' => 'Sirkuit', 'nilai' => 'Custom Dual-Layer PCB', 'ikon' => 'fa-solid fa-microchip', 'warna' => 'text-rose-500'],
                ],
            ],
            [
                'judul' => 'IoT Telemetry Environmental Monitor',
                'kategori' => 'IoT',
                'lencana_kategori' => 'IOT MONITORING',
                'subjudul_lencana' => 'SOLAR POWERED NODE',
                'urutan' => 2,
                'deskripsi' => 'Sistem akuisisi data sensor lingkungan real-time bertenaga solar panel dengan transmisi nirkabel berdaya hemat mikro-ampere.',
                'gambar_desain' => 'img/logo.png',
                'gambar_aplikasi' => 'img/logo.png',
                'berkas_unduhan' => null,
                'status_aktif' => true,
                'sorotan_teknis' => [
                    ['judul' => 'Sensor', 'nilai' => 'BME280 + PMS Dust', 'ikon' => 'fa-solid fa-wind', 'warna' => 'text-cyan-500'],
                    ['judul' => 'Protokol', 'nilai' => 'ESP-NOW & MQTT Broker', 'ikon' => 'fa-solid fa-radio', 'warna' => 'text-emerald-500'],
                    ['judul' => 'Baterai', 'nilai' => '18650 + Solar MPPT', 'ikon' => 'fa-solid fa-solar-panel', 'warna' => 'text-amber-500'],
                    ['judul' => 'Dashboard', 'nilai' => 'Laravel Cloud Analytics', 'ikon' => 'fa-solid fa-chart-line', 'warna' => 'text-rose-500'],
                ],
            ],
        ];
    }

    public static function ambilSemua()
    {
        try {
            $data = static::orderBy('urutan', 'asc')->get();
            if ($data->isNotEmpty()) {
                return $data;
            }

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
}
