<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Marca;
use App\Models\AparelhoEletrico;
use App\Models\Item;
use App\Models\Cliente;
use App\Models\Funcionario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'João',
            'email' => '189146@upf.br',
            'password' => '123',
        ]);

        
        Marca::create([
            'nome' => 'ELE',
        ]);
        Marca::create([
            'nome' => 'Spin',
        ]);

        AparelhoEletrico::create([
            'marca_id' => Marca::where('nome', 'ELE')->first()->id,
            'nome' => 'Geladeira ELE 240L Uma Porta Branca 127v',
            'voltagem_minima' => 127,
            'voltagem_maxima' => 127,
        ]);
        AparelhoEletrico::create([
            'marca_id' => Marca::where('nome', 'Spin')->first()->id,
            'nome' => 'Liquidificador Spin 1000 Preto 3,2L - 220V',
            'voltagem_minima' => 220,
            'voltagem_maxima' => 220,
            'potencia' => 1400,
            'consumo' => 1.4,
            'largura' => 215,
            'altura' =>  422,
            'profundidade' =>  220,
            'peso' => 2200,
        ]);
        
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

        Funcionario::create([
            'nome' => 'João'
        ]);
        Cliente::create([
            'nome' => 'Fulano'
        ]);
    }
}
