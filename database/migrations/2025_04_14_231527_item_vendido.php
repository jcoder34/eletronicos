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
        Schema::create('cliente', function (Blueprint $t) {
            $t->id();
            $t->string('nome', 100)->unique();
            $t->string('cpf', 14)->unique()->nullable();
            $t->string('cep', 11)->unique()->nullable();
            $t->string('rua', 100)->nullable();
            $t->string('bairro', 100)->nullable();
            $t->string('numero', 10)->nullable();
            $t->string('telefone', 11)->unique()->nullable();
            $t->string('email')->unique()->nullable();
            $t->date('data_nascimento')->nullable();
        });

        Schema::create('funcionario', function (Blueprint $t) {
            $t->id();
            $t->string('nome', 100)->unique();
            $t->string('telefone', 11)->unique()->nullable();
            $t->string('email')->unique()->nullable();
        });

        Schema::create('venda', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('funcionario');
            $t->unsignedBigInteger('cliente');
            $t->timestamp('data');
            $t->foreign('funcionario')->references('id')->on('funcionario');
            $t->foreign('cliente')->references('id')->on('cliente');
        });

        Schema::create('item_vendido', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('item_id');
            $t->unsignedBigInteger('venda_id');
            $t->decimal('desconto', 10, 2);
            $t->decimal('promocao', 10, 2);
            $t->foreign('item_id')->references('id')->on('item');
            $t->foreign('venda_id')->references('id')->on('venda');
            $t->unique(['item_id', 'venda_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
        Schema::dropIfExists('funcionario');
        Schema::dropIfExists('venda');
        Schema::dropIfExists('item_vendido');
    }
};
