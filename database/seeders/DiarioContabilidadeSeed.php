<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiarioContabilidadeSeed extends Seeder
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
                      'nrOperacao' => $faker->randomNumber(8),
                      'nrAnoOperacao' => $faker->year,
                      'dtOperacao' => $faker->date,
                      'idTipoMovimentoContabil' => $faker->randomNumber(1),
                      'idTipoFinanceiroPatrimonial' => $faker->randomNumber(1),
                      'cdClasse' => $faker->randomLetter,
                      'cdGrupo' => $faker->randomLetter,
                      'cdSubGrupo' => $faker->randomLetter,
                      'cdTitulo' => $faker->randomLetter,
                      'cdSubTitulo' => $faker->randomLetter,
                      'cdItem' => $faker->numerify('##'),
                      'cdSubItem' => $faker->numerify('##'),
                      'cdNivel8' => $faker->numerify('##'),
                      'cdNivel9' => $faker->numerify('##'),
                      'cdNivel10' => $faker->numerify('##'),
                      'cdNivel11' => $faker->numerify('##'),
                      'cdNivel12' => $faker->numerify('##'),
                      'nrAnoAplicacaoPlano' => $faker->year,
                      'tpNaturezaSaldo' => $faker->randomNumber(1),
                      'vlOperacao' => $faker->randomFloat(2, 100, 1000),
                      'idEventoPadraoTCE' => $faker->randomNumber(3),
                      'nrEventoEntidade' => $faker->randomNumber(8),
                      'nrLancamento' => $faker->numerify('#############'),
                      'dsHistorico' => $faker->text(200),
                      'idTipoVariacaoQualitativa' => $faker->randomNumber(1),
                      'created_at' => now(),
                      'updated_at' => now(),
                  ];
              }
      
              DB::table('diario_contabilidades')->insert($items);
              
    }
}
