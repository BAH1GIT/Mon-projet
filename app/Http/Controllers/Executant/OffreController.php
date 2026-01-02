<?php

namespace App\Http\Controllers\Executant;

use App\Models\Offre;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Liste des offres de l'exécutant connecté
     */
    public function index()
    {
        $offres = Offre::with('mission')
            ->where('executant_id', Auth::id())
            ->latest()
            ->get();

        return view('executant.offres.index', compact('offres'));
    }

    public function dispo()
    {
        $missions = Mission::all();
        return view('executant.missions.dispo', compact('missions'));
    }

    /**
     * Formulaire de création
     */
    public function create(Mission $mission)
    {

        // Sécurité : mission publiée seulement
        // if ($mission->status !== 'en_attent' || $mission->status!=='reception_offre') {
        //     abort(403, 'Vous ne pouvez pas créer une offre sur cette mission.');
        // }
        // $missions = Mission::all(); // ou seulement disponibles
        // return view('executant.offres.create', compact('missions'));

        return view('executant.offres.create', compact('mission'));
    }

    /**
     * Enregistrement d’une offre
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mission_id' => 'required|exists:missions,id',
            'montant'    => 'required|numeric|min:1',
            'message'    => 'nullable|string',
        ]);

        Offre::create([
            'mission_id'   => $validated['mission_id'],
            'executant_id' => Auth::id(),
            'montant'      => $validated['montant'],
            'message'      => $validated['message'] ?? null,
        ]);

        return redirect()
            ->route('executant.offres.index')
            ->with('success', 'Offre envoyée avec succès');
    }

    /**
     * Détails d’une offre
     */
    public function show($id)
    {
        $offre = Offre::with('mission')
            ->where('executant_id', Auth::id())
            ->findOrFail($id);

        return view('executant.offres.show', compact('offre'));
    }

    /**
     * Formulaire de modification
     */
    public function edit($id)
    {
        $offre = Offre::with('mission')
            ->where('executant_id', Auth::id())
            ->findOrFail($id);

        return view('executant.offres.edit', compact('offre'));
    }

    /**
     * Mise à jour
     */
    public function update(Request $request, $id)
    {
        $offre = Offre::where('executant_id', Auth::id())
            ->findOrFail($id);

        $validated = $request->validate([
            'montant' => 'required|numeric|min:1',
            'message' => 'required|string',
        ]);

        $offre->update($validated);

        return redirect()
            ->route('executant.offres.index')
            ->with('success', 'Offre modifiée avec succès');
    }

    /**
     * Suppression
     */
    public function destroy($id)
    {
        $offre = Offre::where('executant_id', Auth::id())
            ->findOrFail($id);

        $offre->delete();

        return redirect()
            ->route('executant.offres.index')
            ->with('success', 'Offre supprimée avec succès');
    }
}
