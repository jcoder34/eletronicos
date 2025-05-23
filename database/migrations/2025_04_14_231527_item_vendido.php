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
            $t->string('nome', 50)->unique();
            $t->string('cpf', 11)->unique()->nullable();
            $t->string('cep', 8)->nullable();
            $t->string('rua', 64)->nullable();
            $t->string('bairro', 64)->nullable();
            $t->string('numero', 5)->nullable();
            $t->string('telefone', 11)->nullable();
            $t->string('email')->nullable();
            $t->date('data_nascimento')->nullable();
            $t->timestamps();
        });

        Schema::create('funcionario', function (Blueprint $t) {
            $t->id();
            $t->string('nome', 50)->unique();
            $t->string('cpf', 11)->unique()->nullable();
            $t->string('cep', 8)->nullable();
            $t->string('rua', 64)->nullable();
            $t->string('bairro', 64)->nullable();
            $t->string('numero', 5)->nullable();
            $t->string('telefone', 11)->nullable();
            $t->string('email')->nullable();
            $t->date('data_nascimento')->nullable();
            $t->timestamps();
        });

        Schema::create('venda', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('funcionario');
            $t->unsignedBigInteger('cliente');
            $t->decimal('total', 10, 2);
            $t->timestamps();
            $t->foreign('funcionario')->references('id')->on('funcionario');
            $t->foreign('cliente')->references('id')->on('cliente');
        });

        Schema::create('item_vendido', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('item');
            $t->unsignedBigInteger('venda');
            $t->decimal('desconto', 10, 2)->nullable();
            $t->decimal('promocao', 10, 2)->nullable();
            $t->timestamps();
            $t->foreign('item')->references('id')->on('item')->onDelete('cascade');
            $t->foreign('venda')->references('id')->on('venda')->onDelete('cascade');
            $t->unique(['item', 'venda']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_vendido');
        Schema::dropIfExists('venda');
        Schema::dropIfExists('funcionario');
        Schema::dropIfExists('cliente');
    }
};
