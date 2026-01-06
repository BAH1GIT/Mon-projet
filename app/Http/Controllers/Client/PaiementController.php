<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(){
    $missions = Mission::with(['offres.executant'])
    ->where('client_id', Auth::id())
    ->get();
    
    return view("client.paiements.index",compact("missions"));
  }
    public function show(Mission $mission){
    $paiement = Paiement::with('executant')->where('mission_id', $mission->id)->firstOrFail();
    return view('client.paiements.show', compact('paiement','mission'));
  }
}
