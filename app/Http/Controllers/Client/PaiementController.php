<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Offre;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
  public function index()
  {
    // $missions = Mission::with(['offres.executant', 'offres.paiement'])
    //   ->where('client_id', Auth::id())
    //   ->get();
    $paiements = Paiement::with(['executant', 'mission'])
      ->where('client_id', Auth::id())  
      ->get();

    return view("client.paiements.index", compact("paiements"));
  }
  public function show(Paiement $paiement)
  {
    $paiement -> load('mission','executant');
    return view('client.paiements.show', compact('paiement'));
  }
}
