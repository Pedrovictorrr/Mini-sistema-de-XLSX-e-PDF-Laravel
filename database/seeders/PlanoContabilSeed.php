<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanoContabilSeed extends Seeder
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
                     'idPessoa' => $i,
                     'cdClasse' => $faker->regexify('[0-9]{9}'),
                     'cdGrupo' => $faker->regexify('[0-9]{9}'),
                     'cdSubGrupo' => $faker->regexify('[0-9]{9}'),
                     'cdTitulo' => $faker->regexify('[0-9]{9}'),
                     'cdSubTitulo' => $faker->regexify('[0-9]{9}'),
                     'cdItem' => $faker->regexify('[0-9]{2}'),
                     'cdSubItem' => $faker->regexify('[0-9]{2}'),
                     'cdNivel8' => $faker->regexify('[0-9]{2}'),
                     'cdNivel9' => $faker->regexify('[0-9]{2}'),
                     'cdNivel10' => $faker->regexify('[0-9]{2}'),
                     'cdNivel11' => $faker->regexify('[0-9]{2}'),
                     'cdNivel12' => $faker->regexify('[0-9]{2}'),
                     'nrAnoAplicacao' => $faker->numberBetween(2000, 2023),
                     'dsConta' => $faker->text(250),
                     'tpNaturezaSaldo' => $faker->randomElement(['C', 'D']),
                     'tpEscrituracao' => $faker->randomElement(['A', 'B']),
                     'tpNaturezaInformacao' => $faker->randomElement(['X', 'Y']),
                     'tpSuperavitFinanceiro' => $faker->randomElement(['M', 'N']),
                     'tpControleConta' => $faker->randomElement(['P', 'Q']),
                     'created_at' => now(),
                     'updated_at' => now(),
                 ];
             }
     
             DB::table('plano_contabils')->insert($items);
    }
}
