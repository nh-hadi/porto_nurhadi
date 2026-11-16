<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projek', function (Blueprint $table) {
            if (!Schema::hasColumn('projek', 'tautan_unduh_apk')) {
                $table->string('tautan_unduh_apk')->nullable()->after('berkas_unduhan');
            }
            if (!Schema::hasColumn('projek', 'tautan_unduh_desktop')) {
                $table->string('tautan_unduh_desktop')->nullable()->after('tautan_unduh_apk');
            }
            if (!Schema::hasColumn('projek', 'tautan_demo')) {
                $table->string('tautan_demo')->nullable()->after('tautan_unduh_desktop');
            }
            if (!Schema::hasColumn('projek', 'tautan_repositori')) {
                $table->string('tautan_repositori')->nullable()->after('tautan_demo');
            }
        });

        Schema::table('produk', function (Blueprint $table) {
            if (!Schema::hasColumn('produk', 'deskripsi_singkat')) {
                $table->text('deskripsi_singkat')->nullable()->after('tag_chip');
            }
            if (!Schema::hasColumn('produk', 'deskripsi_lengkap')) {
                $table->text('deskripsi_lengkap')->nullable()->after('deskripsi_singkat');
            }
            if (!Schema::hasColumn('produk', 'tautan_pembelian')) {
                $table->string('tautan_pembelian')->nullable()->after('teks_pesan_wa');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projek', function (Blueprint $table) {
            $table->dropColumn(['tautan_unduh_apk', 'tautan_unduh_desktop', 'tautan_demo', 'tautan_repositori']);
        });

        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn(['deskripsi_singkat', 'deskripsi_lengkap', 'tautan_pembelian']);
        });
    }
};
