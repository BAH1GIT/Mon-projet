<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Offre;
use App\Models\Paiement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function index()
    {
        $missions = Mission::with('offres.executant')
            ->where('client_id', Auth::id())
            ->get();
        return view('client.offres.index', compact('missions'));
    }
    public function show(Offre $offre)
    {
        $offre->load('executant', 'mission','paiement');

        return view('client.offres.show', compact('offre'));
    }
    public function accepter(Offre $offre)
    {
        $mission = $offre->mission;
        if ($offre->mission->client_id !== Auth::id()) {
            abort(403);
        }

        DB::transaction(function () use ($mission, $offre) {
            $offre->update(['status' => 'accepter']);

            Offre::where('mission_id', $mission->id)
                ->where('id', '!=', $offre->id)
                ->update(['status' => 'refuser']);

            $mission->status = 'attribuer';
            $mission->save();

            $commissionMontant = ($offre->montant * 10) / 100;
            $montantNet = $offre->montant - $commissionMontant;

           Paiement::create([
                'mission_id' => $offre->mission_id,
                'client_id' => Auth::id(),
                'montant' => $offre->montant,
                'commission_montant' => $commissionMontant,
                'montant_net' => $montantNet,
                'commission_pourcentage' => 10,
                'status' => 'payer',
                'executant_id' => $offre->executant_id,
            ]);
        });
        return redirect()->route('client.offres.show')->with('success', 'Offre accepter. Procedure de paiement.');
    }
};
