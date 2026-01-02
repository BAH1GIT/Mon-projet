<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OffreController extends Controller
{
    public function index(){
        $offres =Offre::with("mission.client","mission.executant")->get();
        return view("admin.offres.index",compact("offres"));
    }

    public function show(Offre $offre){
        $offre ->load(['mission','executant'    ]);
        return view('admin.offres.show',compact('offre'));
    }
    public function destroy(Offre $offre){
        $offre->delete();
        return redirect('admin.offres.index')->with('success','offre supprime avec success.');
    }
}
