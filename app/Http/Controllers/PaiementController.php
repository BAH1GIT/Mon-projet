<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
  public function index(){
    $paiements = Paiement::all();
    return view("admin.paiements.index",compact("paiements"));
  }

  
}
