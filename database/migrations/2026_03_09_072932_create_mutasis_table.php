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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan');
            $table->foreignId('unit_asal_id')->constrained()->onDelete('cascade')->on('units')->onUpdate('cascade');
            $table->foreignId('unit_tujuan_id')->constrained()->onDelete('cascade')->on('units')->onUpdate('cascade');
            $table->foreignId('hardware_id')->constrained()->onDelete('cascade')->on('hardwares')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->on('users')->onUpdate('cascade');
            $table->timestamps();
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }

};
