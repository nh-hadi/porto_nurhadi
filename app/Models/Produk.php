<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $guarded = [];

    protected $casts = [
        'spesifikasi_teknis' => 'array',
        'status_aktif' => 'boolean',
    ];

    public static function dataAwal(): array
    {
        return [
            [
                'kode_produk' => 'IDS-PSU-01',
                'nama_produk' => 'Smart Digital PSU V1.0.2 Ready Unit',
                'kategori' => 'psu',
                'lencana_kategori' => 'PSU UNIT',
                'status_stok' => 'Ready',
                'harga' => 450000,
                'harga_format' => 'Rp 450.000',
                'gambar' => 'img/logo.png',
                'sub_kategori' => 'Hardware Unit',
                'tag_chip' => 'ESP-12F',
                'urutan' => 1,
                'status_aktif' => true,
                'spesifikasi_teknis' => [
                    ['ikon' => 'fa-solid fa-bolt', 'warna' => 'text-amber-500', 'nilai' => 'Output 0-30V 5A Adjustable'],
                    ['ikon' => 'fa-solid fa-wifi', 'warna' => 'text-cyan-500', 'nilai' => 'Kendali Wi-Fi & Web Dashboard'],
                    ['ikon' => 'fa-solid fa-shield-halved', 'warna' => 'text-emerald-500', 'nilai' => 'Short Circuit & OVP Protection'],
                ],
                'teks_pesan_wa' => 'Halo IDS Store, saya ingin order Smart Digital PSU V1.0.2',
            ],
            [
                'kode_produk' => 'IDS-IOT-02',
                'nama_produk' => 'ESP32 Industrial IoT Controller Board',
                'kategori' => 'iot',
                'lencana_kategori' => 'IOT BOARD',
                'status_stok' => 'Ready',
                'harga' => 185000,
                'harga_format' => 'Rp 185.000',
                'gambar' => 'img/logo.png',
                'sub_kategori' => 'Dev Kit',
                'tag_chip' => 'ESP32-WROOM',
                'urutan' => 2,
                'status_aktif' => true,
                'spesifikasi_teknis' => [
                    ['ikon' => 'fa-solid fa-microchip', 'warna' => 'text-cyan-500', 'nilai' => 'ESP32 240MHz Dual-Core'],
                    ['ikon' => 'fa-solid fa-toggle-on', 'warna' => 'text-rose-500', 'nilai' => '4-Channel Isolated Relay'],
                    ['ikon' => 'fa-solid fa-plug', 'warna' => 'text-amber-500', 'nilai' => 'Wide Input 7-28V DC'],
                ],
                'teks_pesan_wa' => 'Halo IDS Store, saya ingin order ESP32 Industrial IoT Board',
            ],
            [
                'kode_produk' => 'IDS-CST-03',
                'nama_produk' => 'Jasa Desain PCB & Prototyping IoT',
                'kategori' => 'custom',
                'lencana_kategori' => 'CUSTOM SERVICE',
                'status_stok' => 'Ready',
                'harga' => 250000,
                'harga_format' => 'Mulai Rp 250.000',
                'gambar' => 'img/logo.png',
                'sub_kategori' => 'Engineering Service',
                'tag_chip' => 'KiCAD / Gerber',
                'urutan' => 3,
                'status_aktif' => true,
                'spesifikasi_teknis' => [
                    ['ikon' => 'fa-solid fa-layer-group', 'warna' => 'text-purple-500', 'nilai' => 'Skematik + Layout 2-Layer'],
                    ['ikon' => 'fa-solid fa-file-zipper', 'warna' => 'text-emerald-500', 'nilai' => 'File Gerber & BOM Siap Fabrikasi'],
                    ['ikon' => 'fa-solid fa-code', 'warna' => 'text-cyan-500', 'nilai' => 'Bonus Source Code Firmware C++'],
                ],
                'teks_pesan_wa' => 'Halo IDS Store, saya ingin konsultasi Jasa Desain PCB & Prototyping IoT',
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
