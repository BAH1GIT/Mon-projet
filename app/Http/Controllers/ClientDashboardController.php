<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        return view('client.dashboard', [
            'mission' => Mission::where('client_id', Auth::id())->count(),
            'offreRefuser' => Offre::whereHas('mission', function ($q) {
                $q->where('client_id', Auth::id());
            })
                ->where('status', 'refuser')
                ->count(),
            'offreAccepter' => Offre::whereHas('mission', function ($q) {
                $q->where('client_id', Auth::id());
            })
                ->where('status', 'accepter')
                ->count(),
            'offreEnAttente' => Offre::whereHas('mission', function ($q) {
                $q->where('client_id', Auth::id());
            })
                ->where('status', 'en_attente')
                ->count(),
            'missionEnCour' => Mission::where('status', '!=', 'terminer')
                ->where('client_id', Auth::id())->count(),
            'missionSansOffre' => Mission::where('client_id', Auth::id())
                ->whereDoesntHave('offres')
                ->count(),

        ]);
    }
}
