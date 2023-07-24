<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mensagem' => fake()->text(50),
            'assunto' => fake()->text(30),
            'user_id' => rand(1, 10),
            'modulo_id' => rand(1, 4),
            'situacao_id' => rand(1, 3),
            'ultima_resposta' => now(),
        ];
    }
}
