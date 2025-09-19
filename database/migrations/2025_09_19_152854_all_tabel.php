<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel kategori_surats
        Schema::create('kategori_surats', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_kategori'); 
            $table->text('deskripsi')->nullable(); 
            $table->timestamps();
        });

        // Tabel arsip_surat
        Schema::create('arsip_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->unsignedBigInteger('kategori_id'); 
            $table->string('judul');
            $table->timestamp('waktu_pengarsipan')->nullable();
            $table->string('file_surat')->nullable();
            $table->timestamps();

            // foreign key
            $table->foreign('kategori_id')
                  ->references('id')
                  ->on('kategori_surats')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('arsip_surat', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
        });

        Schema::dropIfExists('arsip_surat');
        Schema::dropIfExists('kategori_surats');
    }
};
