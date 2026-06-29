<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('memorials', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('hubungan');
            $table->enum('status', ['Masih Hidup', 'Telah Berpulang'])
                  ->default('Masih Hidup');
            $table->date('tanggal_dibuat')->nullable();
            $table->string('foto')->nullable();
            $table->text('cerita');
            $table->text('doa')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memorials');
    }
};