<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExecutantDashboardController extends Controller
{
   public function index(){
    return view('executant.dashboard');
   }
}
