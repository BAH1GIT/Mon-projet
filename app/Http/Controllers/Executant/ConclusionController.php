<?php

namespace App\Http\Controllers\Executant;

use App\Http\Controllers\Controller;
use App\Models\Conclusion;
use App\Models\Mission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConclusionController extends Controller
{
    
    public function terminer(Mission $mission){
        $offre =$mission->offres->where('executant_id',Auth::id())->first();
        if(!$offre){
            abort(403);
        };
        Conclusion::firstOrCreate([
            'mission_id' => $mission->id,
            'executant_id' =>Auth::id(),
            'client_id' =>$mission->client_id,
            'commentaire' =>'string|nullable'
        ]);
        return back()->with('success','travail terminer');
    }
}
