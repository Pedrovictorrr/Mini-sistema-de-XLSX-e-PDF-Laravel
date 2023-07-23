<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovimentoContabilMensalSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             // Generate 15 random items for the table
             $items = [];
             $faker = \Faker\Factory::create();
     
             for ($i = 1; $i <= 15; $i++) {
                 $items[] = [
                     'idPessoa' => $faker->randomNumber(6),
                     'cdClasse' => $faker->numerify('#########'),
                     'cdGrupo' => $faker->numerify('#########'),
                     'cdSubGrupo' => $faker->numerify('#########'),
                     'cdTitulo' => $faker->numerify('#########'),
                     'cdSubTitulo' => $faker->numerify('#########'),
                     'cdItem' => $faker->numerify('##'),
                     'cdSubItem' => $faker->numerify('##'),
                     'cdNivel8' => $faker->numerify('##'),
                     'cdNivel9' => $faker->numerify('##'),
                     'cdNivel10' => $faker->numerify('##'),
                     'cdNivel11' => $faker->numerify('##'),
                     'cdNivel12' => $faker->numerify('##'),
                     'nrAnoAplicacao' => $faker->year,
                     'nrMes' => $faker->numberBetween(1, 12),
                     'idTipoMovimentoContabil' => $faker->randomNumber(9),
                     'idTipoFinanceiroPatrimonial' => $faker->randomNumber(9),
                     'idTipoVariacaoQualitativa' => $faker->randomNumber(9),
                     'vlDebito' => $faker->randomFloat(2, 100, 1000),
                     'vlCredito' => $faker->randomFloat(2, 100, 1000),
                     'created_at' => now(),
                     'updated_at' => now(),
                 ];
             }
     
             DB::table('movimento_contabil_mensals')->insert($items);
    }
}
