<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
  public function index(){
    $paiements = Paiement::all();
    return view("client.paiements.index",compact("paiements"));
  }

  public function show(Mission $mission){
    $paiement = Paiement::where('mission_id', $mission->id)->firstOrFail();
    return view('client.paiements.show', compact('paiement','mission'));
  }
}
