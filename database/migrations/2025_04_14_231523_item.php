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
            $t->unsignedBigInteger('aparelho_eletrico');
            $t->decimal('valor', 10, 2);
            $t->date('data');
            $t->foreign('aparelho_eletrico')->references('id')->on('aparelho_eletrico');
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
