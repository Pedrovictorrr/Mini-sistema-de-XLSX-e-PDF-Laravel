<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpenhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->insertGetId([
            'name' => 'Cláudio Severino Erick Nunes',
            'cpf' => '794.687.068-00',
            'email' => 'claudio_nunes@redex.com.br',
            'role' => 3,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $contratoId = DB::table('contratos')->insertGetId([
            'id' => 1,
            'data' => '2023-02-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $empenhoId = DB::table('empenhos')->insertGetId([
            'id' => 1,
            'user_id' => $userId,
            'contrato_id' => $contratoId,
            'data_emissao' => '2023-02-01',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
