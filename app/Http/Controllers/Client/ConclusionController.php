<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Conclusion;
use App\Models\Mission;
use App\Models\Paiement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConclusionController extends Controller
{
    public function valider(Request $request, Mission $mission)
    {
        // Validation formulaire
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'commentaire' => 'string|nullable',
        ]);

        // Vérifier que le client est bien le propriétaire de la mission
        if ($mission->client_id !== Auth::id()) {
            abort(403);
        }

        // Récupérer la conclusion liée à la mission
        $conclusion = Conclusion::where('mission_id', $mission->id)->firstOrFail();

        // Mettre à jour la conclusion
        $conclusion->update([
            'validation_client' => true,
            'rating' => $request->rating,
            'commentaire' => $request->commentaire,
        ]);

        // Mettre à jour le statut de la mission
        $mission->status = 'terminer';
        $mission->save();

        // Vérifier le paiement
        $paiement = Paiement::where('mission_id', $mission->id)->first();
        if ($paiement && $paiement->status !== 'payer') {
            $paiement->update([
                'status' => 'payer',
            ]);
        }

        return back()->with('success', 'Mission validée et paiement effectué.');
    }
}
