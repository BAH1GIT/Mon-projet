<?php

namespace App\Http\Controllers\Executant;

use id;
use App\Models\Offre;
use App\Models\Mission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function indexDisponible()
    {
        $missions = Mission::whereHas('offres', function ($query) {
            $query->where('executant_id', Auth::id());
        })
            ->with(['offres' => function ($query) {

                $query->where('executant_id', Auth::id());
            }])
            ->orderByDesc('created_at')
            ->get();

        return view('executant.missions.disponible', compact('missions'));
    }

    public function show(Mission $mission )

    {
        // Récupère l'offre spécifique de l'exécutant pour cette mission
        $offre = Offre::where('mission_id', $mission->id)
            ->where('executant_id', auth::id())
            ->first();

        // Passe la variable $offre à la vue
        return view('executant.missions.show', compact('mission', 'offre'));
    }
}
