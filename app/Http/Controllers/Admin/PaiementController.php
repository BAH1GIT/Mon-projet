<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    // 📄 Liste des paiements
    public function index()
    {
        $paiements = Paiement::with(['mission','executant'])
            ->latest()
            ->get();

        return view('admin.paiements.index', compact('paiements'));
    }

    // 👁️ Voir un paiement
    public function show(Paiement $paiement)
    {
        return view('admin.paiements.show', compact('paiement'));
    }

    // ✏️ Formulaire édition
    public function edit(Paiement $paiement)
    {
        return view('admin.paiements.edit', compact('paiement'));
    }

    // 💾 Mise à jour
    public function update(Request $request, Paiement $paiement)
    {
        $request->validate([
            'status' => 'required|in:en_attente,payer,refuser',
        ]);

        $paiement->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.paiements.index')
            ->with('success', 'Paiement mis à jour avec succès.');
    }

    // 🗑️ Supprimer
    public function destroy(Paiement $paiement)
    {
        $paiement->delete();

        return redirect()
            ->route('admin.paiements.index')
            ->with('success', 'Paiement supprimé.');
    }
}
