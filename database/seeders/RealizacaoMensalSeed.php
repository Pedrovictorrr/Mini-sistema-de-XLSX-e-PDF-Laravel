<?php

namespace Database\Seeders;

use App\Models\RealizacaoMensalReceitaFonte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealizacaoMensalSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            RealizacaoMensalReceitaFonte::create([
                'idPessoa' => $faker->randomNumber(5),
                'cdFonte' => $faker->randomNumber(4),
                'cdMarcadorSTN' => $faker->randomNumber(3),
                'cdCategoriaEconomica' => $faker->randomNumber(1),
                'cdOrigem' => $faker->randomNumber(1),
                'cdEspecie' => $faker->randomNumber(1),
                'cdDesdobramentoD1' => $faker->randomNumber(1),
                'cdDesdobramentoDD2' => $faker->randomNumber(2),
                'cdDesdobramentoD3' => $faker->randomNumber(1),
                'cdTipoNaturezaReceita' => $faker->randomNumber(1),
                'cdNivel8' => $faker->randomNumber(2),
                'cdNivel9' => $faker->randomNumber(2),
                'cdNivel10' => $faker->randomNumber(2),
                'cdNivel11' => $faker->randomNumber(2),
                'cdNivel12' => $faker->randomNumber(2),
                'nrAnoAplicacao' => $faker->year,
                'idTipoOperacaoReceita' => $faker->randomNumber(2),
                'nrMes' => $faker->numberBetween(1, 12),
                'vlOperacao' => $faker->randomFloat(2, 100, 10000),
            ]);
        }
    }
}
