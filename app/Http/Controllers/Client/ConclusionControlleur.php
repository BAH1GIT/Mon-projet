<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Conclusion;
use App\Models\Mission;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConclusionControlleur extends Controller
{
    public function valider(Request $request, Mission $mission)
    {
        $request->validate([
            'rating' => 'required',
            'commentaire' => 'string|nullable',

        ]);
        $conclusion = Conclusion::where('mission_id', $mission->id)
        ->where('client_id', Auth::id())
        ->firstOrFail();

        $conclusion->update([
            'validation_client' => true,
            'rating' => $request->rating,
            'commentaire' => $request->commentaire,
        ]);

        $paiement = Paiement::where('mission_id', $mission->id)->first();
        if ($paiement && $paiement->status !== 'payer') {
            $paiement->update([
                'status' => 'payer',
            ]);
        }
        return back()->with('success', 'payement effectuer');
    }
}
