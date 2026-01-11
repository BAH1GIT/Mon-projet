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

        return view('executant.missions.missionOffre', compact('missions'));
    }

    public function show(Mission $mission )

    {   $offre = Offre::with('mission')
            ->where('executant_id', Auth::id())
            ->findOrFail($mission->offre_id);
        return view('executant.missions.show', compact('mission', 'offre'));
    }
}
