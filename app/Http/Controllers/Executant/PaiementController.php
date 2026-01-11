<?php

namespace App\Http\Controllers\Executant;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Offre;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(){
        $paiements =Paiement::with(['mission','client'])
        ->where('executant_id',Auth::id())
        ->orderBy('created_at','desc')
        ->get();
        return view('executant.paiements.index',compact('paiements'));
    }
    public function show(Paiement $paiement){
        $paiement ->load(['mission','client']);
        return view('executant.paiements.show',compact('paiement'));
    }
}
