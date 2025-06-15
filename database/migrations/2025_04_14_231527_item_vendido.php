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
            $t->unsignedBigInteger('funcionario_id')->nullable();
            $t->unsignedBigInteger('cliente_id')->nullable();
            $t->decimal('total', 11, 2);
            $t->timestamps();
            $t->foreign('funcionario_id')->references('id')->on('funcionario')->onUpdate('cascade')->onDelete('SET NULL');
            $t->foreign('cliente_id')->references('id')->on('cliente')->onUpdate('cascade')->onDelete('SET NULL');
        });

        Schema::create('item_vendido', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('item_id')->unique();
            $t->unsignedBigInteger('venda_id');
            $t->decimal('desconto', 11, 2)->nullable();
            $t->decimal('promocao', 11, 2)->nullable();
            $t->timestamps();
            $t->foreign('item_id')->references('id')->on('item')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('venda_id')->references('id')->on('venda')->onDelete('cascade')->onUpdate('cascade');
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
