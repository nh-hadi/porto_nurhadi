<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pengaturan_situs')) {
            Schema::create('pengaturan_situs', function (Blueprint $table) {
                $table->id();
                $table->string('nama_toko')->default('IDS STORE TECHNOLOGY');
                $table->string('nama_lengkap')->default('Nurhadi');
                $table->string('warna_aksen')->default('racing');
                $table->string('judul_hero')->default('Halo, Saya Nurhadi');
                $table->string('tagline')->default('Pengembang IoT, Hardware, Laravel & Flutter');
                $table->text('deskripsi_profil')->nullable();
                $table->string('nomor_whatsapp')->default('6281234567890');
                $table->string('email')->nullable();
                $table->string('tautan_toko')->default('#store');
                $table->string('tautan_github')->nullable();
                $table->string('tautan_linkedin')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('keahlian')) {
            Schema::create('keahlian', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('kategori')->default('Hardware');
                $table->string('lencana')->default('KOMPETEN');
                $table->string('ikon')->default('fa-solid fa-microchip');
                $table->string('warna_tema')->default('amber');
                $table->text('deskripsi')->nullable();
                $table->json('label_teknologi')->nullable();
                $table->integer('urutan')->default(1);
                $table->boolean('status_aktif')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('projek')) {
            Schema::create('projek', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('kategori')->default('Hardware');
                $table->string('lencana_kategori')->default('PROTOTYPE HARDWARE');
                $table->string('subjudul_lencana')->nullable();
                $table->text('deskripsi')->nullable();
                $table->string('gambar_desain')->nullable();
                $table->string('gambar_aplikasi')->nullable();
                $table->string('berkas_unduhan')->nullable();
                $table->json('sorotan_teknis')->nullable();
                $table->integer('urutan')->default(1);
                $table->boolean('status_aktif')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('produk')) {
            Schema::create('produk', function (Blueprint $table) {
                $table->id();
                $table->string('kode_produk')->unique();
                $table->string('nama_produk');
                $table->string('kategori')->default('psu');
                $table->string('lencana_kategori')->default('PSU UNIT');
                $table->string('status_stok')->default('Ready');
                $table->decimal('harga', 12, 2)->default(0);
                $table->string('harga_format')->default('Rp 0');
                $table->string('gambar')->nullable();
                $table->string('sub_kategori')->nullable();
                $table->string('tag_chip')->nullable();
                $table->json('spesifikasi_teknis')->nullable();
                $table->text('teks_pesan_wa')->nullable();
                $table->integer('urutan')->default(1);
                $table->boolean('status_aktif')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
        Schema::dropIfExists('projek');
        Schema::dropIfExists('keahlian');
        Schema::dropIfExists('pengaturan_situs');
    }
};
