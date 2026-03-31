<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->string('kd_barang');
            $table->string('no_iventaris');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('merek');
            $table->string('tipe');
            $table->text('spek');
            $table->text('keterangan')->nullable();
            $table->foreignId('unit_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardwares');
    }

    
};
