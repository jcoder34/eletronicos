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
        Schema::create('item', function (Blueprint $t) {
            $t->id();
            $t->unsignedBigInteger('aparelho_eletrico_id')->nullable();
            $t->string('codigo', 30)->index()->unique();
            $t->decimal('valor', 11, 2)->nullable();
            $t->decimal('preco_venda', 11, 2);
            $t->date('data');
            $t->timestamps();
            $t->foreign('aparelho_eletrico_id')->references('id')->on('aparelho_eletrico')->onUpdate('cascade')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
