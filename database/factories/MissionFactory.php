<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // On prend un client aléatoire
        $client = User::where('role', 'client')->iget();
        return [
            'client_id'   => $client ? $client->id : null,
            'title'       =>substr( ucfirst($this->faker->sentence(3)),0,255),
            'description' => $this->faker->paragraph(3),
            'budget_min'  => $this->faker->numberBetween(50_000, 150_000),
            'budget_max'  => $this->faker->numberBetween(200_000, 600_000),
            'date_limit'  => $this->faker->dateTimeBetween('+7 days', '+45 days'),
            'status'      => $this->faker->randomElement([
                'en_attente',
                'reception_offre',
                'attribuer',
                'completer',
            ]),
        ];
    }
}
