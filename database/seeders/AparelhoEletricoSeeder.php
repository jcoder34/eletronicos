<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Marca;
use App\Models\AparelhoEletrico;

class AparelhoEletricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
