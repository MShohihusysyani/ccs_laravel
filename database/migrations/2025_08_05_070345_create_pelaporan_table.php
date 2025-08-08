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
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->bigIncrements('id_pelaporan');
            $table->unsignedBigInteger('klien_id');
            $table->string('nama');
            $table->string('no_tiket', 100);
            $table->string('judul')->nullable();
            $table->longText('perihal')->nullable();
            $table->string('kategori')->nullable();
            $table->string('priority', 100);
            $table->integer('maxday')->nullable();
            $table->string('file')->nullable();
            $table->string('tags')->nullable();
            $table->string('impact', 100)->nullable();
            $table->string('status', 50)->default('ADDED');
            $table->string('handle_by', 100)->nullable();
            $table->string('handle_by2', 100)->nullable();
            $table->string('handle_by3', 100)->nullable();
            $table->integer('rating');
            $table->tinyInteger('has_rated')->default(0);
            $table->text('catatan_finish')->nullable();
            $table->text('file_finish')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('finish_at');
            $table->integer('mode_fokus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};
