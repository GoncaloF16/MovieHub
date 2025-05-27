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
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('capa', 255);
            $table->string('trailer', 255)->nullable();
            $table->string('duracao', 255)->nullable();
            $table->year('lancamento')->nullable();
            $table->string('genero', 255)->nullable();
            $table->string('realizador', 255)->nullable();
            $table->text('sinopse')->nullable();
            $table->double('imdb_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
