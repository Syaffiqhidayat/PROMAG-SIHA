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
        Schema::create('kerusakans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_respon')->nullable();;
            $table->date('tgl_requst');
            $table->time('waktu_respon')->nullable();;
            $table->time('waktu_requst');
            $table->text('laporan');
            $table->text('tindakan')->nullable();;
            $table->foreignId('hardware_id')->constrained('hardwares')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakans');
    }
};
