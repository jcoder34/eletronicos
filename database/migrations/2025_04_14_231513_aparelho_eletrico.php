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
        Schema::create('marca', function (Blueprint $t) {
            $t->id();
            $t->text('nome')->unique();
        });

        Schema::create('aparelho_eletrico', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('marca');
            $t->string('codigo')->index()->unique();
            $t->text('nome');
            $t->integer('potencia')->nullable();
            $t->integer('voltagem_minima')->nullable();
            $t->integer('voltagem_maxima')->nullable();
            $t->integer('corrente_maxima_entrada')->nullable();
            $t->foreign('marca')->references('id')->on('marca');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aparelho_eletrico');
        Schema::dropIfExists('marca');
    }
};
