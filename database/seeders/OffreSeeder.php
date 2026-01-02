<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exectuants = User::where('role', 'executant')->get();

        if ($exectuants->isEmpty()) {
            $this->command->info('Aucun executant trouve');
            return;
        }
        $missions = Mission::all();

        foreach ($missions as $mission) {
            $nombreOffres = rand(1, 5);
            $offres = Offre::where('mission_id', $mission->id)->get();

            for ($i = 0; $i < $nombreOffres; $i++) {
                Offre::create([
                    'mission_id' => $mission->id,
                    'executant_id' => $exectuants->random()->id,
                    'montant' => rand($mission->budget_min + 20000, $mission->budget_max ? $mission->budget_max - 50000 : $mission->budget_min + 500000),
                    'message' => fake()->sentence(3),
                    'status' => 'en_attente'
                ]);
            }

            if ($offres->count()>0 && in_array($mission->status, ['en_attente', 'reception_offre'])) {
                $offreAccepter = $offres->random();
                $offreAccepter->update([
                    'status' => 'accepter'
                ]);

                Offre::where('mission_id', $mission->id)
                    ->where('id', '!=', $offreAccepter->id)
                    ->update(['statue' => 'refuser']);
            }
        }
    }
}
