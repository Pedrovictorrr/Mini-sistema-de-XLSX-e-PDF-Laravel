<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modulos')->insert([
            ['nome' => 'Contabilidade'],
            ['nome' => 'Compras'],
            ['nome' => 'Planejamento'],
            ['nome' => 'Portal do Fornecedor'],
        ]);
    }
}
