<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountingEntriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'idPessoa' => 2,
            'cdClasse' => 'ClassB',
            'cdGrupo' => 'Group2',
            'cdSubGrupo' => 'SubGroup2',
            'cdTitulo' => 'Title2',
            'cdSubTitulo' => 'SubTitle2',
            'cdItem' => 'Item2',
            'cdSubItem' => 'SubItem2',
            'cdNivel8' => 'N8-2',
            'cdNivel9' => 'N9-2',
            'cdNivel10' => 'N10-2',
            'cdNivel11' => 'N11-2',
            'cdNivel12' => 'N12-2',
            'nrAnoAplicacao' => 2023,
            'dsConta' => 'DescriptionforTitle2',
            'tpNaturezaSaldo' => 'N',
            'tpEscrituracao' => 'S',
            'tpNaturezaInformacao' => 'I',
            'tpSuperavitFinanceiro' => 'S',
            'tpControleConta' => 'C',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('Exportador_Contabil')->insert($data);
    }
}
