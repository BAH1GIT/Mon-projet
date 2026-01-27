<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExecutantDashboardController extends Controller
{
   public function index()
   {
      return view('executant.dashboard', [
         'offre' => Offre::where('executant_id', Auth::id())->count(),
         'offreEnAttente' => Offre::where('executant_id', Auth::id())->where('status', 'en_attente')->count(),
         'offreAccepter' => Offre::where('executant_id', Auth::id())->where('status', 'accepter')->count(),
         'offreRefuser' => Offre::where('executant_id', Auth::id())->where('status', 'refuser')->count(),
         'missionAttribuer' => Mission::whereHas('offres', function ($query) {
            $query->where('executant_id', Auth::id());
         })->where('status', 'attribuer')->count(),
         'missionEnCours' => Mission::whereHas('offres', function ($query) {
            $query->where('executant_id', Auth::id());
         })
            ->where('status', 'en_cours')->count(),
         'missionTerminer' => Mission::whereHas('offres', function ($query) {
            $query->where('executant_id', Auth::id());
         })->where('status', 'terminer')->count(),
      ]);
   }
}
