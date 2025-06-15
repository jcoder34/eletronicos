<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AparelhoEletrico;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'aparelho_eletrico_id' => AparelhoEletrico::where('nome', 'Liquidificador Spin 1000 Preto 3,2L - 220V')->first()->id,
            'codigo' => 'LIQ00001',
            'preco_venda' => 309.90,
            'valor' => 309.90,
            'data' => '2025-05-31',
        ]);
        Item::create([
            'aparelho_eletrico_id' => AparelhoEletrico::where('nome', 'Liquidificador Spin 1000 Preto 3,2L - 220V')->first()->id,
            'codigo' => 'LIQ00002',
            'preco_venda' => 299.99,
            'valor' => 279.99,
            'data' => '2025-05-31',
        ]);
        Item::create([
            'aparelho_eletrico_id' => AparelhoEletrico::where('nome', 'Geladeira ELE 240L Uma Porta Branca 127v')->first()->id,
            'codigo' => 'GEL00001',
            'preco_venda' => 2049.89,
            'valor' => 2049.89,
            'data' => '2025-03-05',
        ]);
    }
}
