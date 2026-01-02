<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mission;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = User::where('role', 'client')->get();

        if ($clients->isEmpty()) {
            $this->command->warn('Aucun client trouvé. Seeder annulé.');
            return;
        }
        $title = [
            'Reparation de voiture',
            'Entretien Electrique ',
            'Renouvellement pelouse ',
            'Demenagement',
            'Creation de site vitrine',
            'Developpement API',
            'Maintenance Laravel',
            'Logo et Identite visuel',
            'Platefom Aprentissage',
            'Application mobile',
            'Refonte Site web',
            'Deratiseur',
        ];
        // Génère 2 à 5 missions par client
        foreach ($clients as $client) {
            $nombreMission = rand(2, 5);
            for ($i = 0; $i < $nombreMission; $i++) {
                Mission::create([
                    'client_id' => $client->id,
                    'title' => $title[array_rand($title)],
                    'description' => 'La mission confier par le client ' . $client->name . ' nécessite des compétences professionnelles.',
                    'budget_min' => rand(50000, 200000),
                    'budget_max' => rand(250000, 800000),
                    'date_limit' => Carbon::now()->addDays(rand(1, 39)),
                    'status' => collect([
                        'en_attente',
                        'reception_offre',
                    ])->random(),
                ]);
            }
        }
        $this->command->info('Missions générées avec succès (2 à 5 par client).');
    }
}
