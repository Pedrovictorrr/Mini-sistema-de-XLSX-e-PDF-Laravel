<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'cpf' => '11111111111',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'name' => 'Test_User1',
            'cpf' => '99999999999',
            'email' => 'testeteste3@example.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
