<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Month;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {

        $missionMoi = Mission::select(
            DB::raw('count(id) as total'),
            DB::raw('Month(created_at) as mois')
        )
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('mois')
            ->orderBy('mois')
            ->get();
            $label =[];
            $data =[];

            for($i=1 ; $i<=12 ;$i++){
                $label[] = Carbon::create()->month($i)->format('M');
                $mois= $missionMoi->firstWhere('mois', $i);
                $data[] = $mois ?$mois->total :0 ;
            }

        return view('admin.dashboard', [
            'client' => User::where('role', 'client')->count(),
            'executant' => User::where('role', 'executant')->count(),
            'terminer' => Mission::where('status', 'terminer')->count(),
            'mission' => Mission::count(),
            'nonTerminer' => Mission::where('status', '!=', 'terminer')->count(),
            'label' => json_encode($label),
            'data' => json_encode($data),
        ]);
    }
}
