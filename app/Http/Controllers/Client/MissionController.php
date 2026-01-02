<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::where('client_id', Auth::id())->orderByDesc('created_at')->get();
        return view('client.missions.index', compact('missions'));
    }

    public function create()
    {
        return view('client.missions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_min' => 'required|numeric|min:1',
            'budget_max'=> 'nullable|numeric|min:1',
            'date_limit'=> 'nullable|date',
        ]);

        $validated['client_id'] = Auth::id();
        $validated['status'] = 'en_attente';

        Mission::create($validated);

        return redirect()->route('client.missions.index')
            ->with('success', 'Mission créée');
    }

    public function show(Mission $mission)
    {
        return view('client.missions.show', compact('mission'));
    }
    public function edit(Mission $mission)
    {
        return view('client.missions.edit', compact('mission'));
    }
    public function update(Request $request, Mission $mission){
             $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_min' => 'required|numeric|min:0',
            'budget_max' => 'nullable|numeric|min:0',
            'date_limit'=> 'nullable|date',
             ]);

        $validated['client_id'] = Auth::id();
        $validated['status'] = 'en_attente';
        $mission->update($validated);

        return redirect()->route('client.missions.index') ->with('success', 'Mission mise à jour');
    }
    public function destroy(Mission $mission){
        $mission->delete();
        return redirect()->route('client.missions.index') ->with('success', 'Mission mise à jour');
    }
}
