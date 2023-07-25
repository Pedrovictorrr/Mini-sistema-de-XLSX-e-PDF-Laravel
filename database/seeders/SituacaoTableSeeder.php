<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('situacaos')->insert([
            ['nome' => 'Em Atendimento'],
            ['nome' => 'Respondida'],
            ['nome' => 'Concluida']
        ]);
    }
}
