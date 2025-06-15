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
            $t->timestamps();
        });

        Schema::create('aparelho_eletrico', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('marca_id')->nullable();
            $t->text('nome')->unique();
            $t->integer('potencia')->nullable();
            $t->float('consumo')->nullable();
            $t->integer('voltagem_minima')->nullable();
            $t->integer('voltagem_maxima')->nullable();
            $t->integer('largura')->nullable();
            $t->integer('altura')->nullable();
            $t->integer('profundidade')->nullable();
            $t->float('peso')->nullable();
            $t->float('corrente_maxima_entrada', 5, 2)->nullable();
            $t->text('imagem')->nullable();
            $t->timestamps();
            $t->foreign('marca_id')->references('id')->on('marca')->onUpdate('cascade');;
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
