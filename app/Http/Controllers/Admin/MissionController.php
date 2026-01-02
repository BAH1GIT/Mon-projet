<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
  {
    $missions = Mission::with(['client', 'executant'])->get(); 
    return view('admin.missions.index', compact('missions'));
}

    public function show(Mission $mission)
    {
        return view('admin.missions.show', compact('mission'));
    }

    public function edit(Mission $mission)
    {
        $clients = User::where('role', 'client')->get();
        return view('admin.missions.edit', compact('mission', 'clients'));
    }



    public function update(Request $request, Mission $mission)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_min' => 'required|numeric|min:0',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'status' => 'required',
        ]);

        $mission->update($validated);

        return redirect()->route('admin.missions.index')
            ->with('success', 'Mission mise à jour');
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();

        return redirect()->route('admin.missions.index')
            ->with('success', 'Mission supprimée');
    }
}

