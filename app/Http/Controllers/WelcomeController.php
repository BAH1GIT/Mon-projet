<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
     public function index(){
        $missions = Mission::inRandomOrder()->paginate(4);
        return view("welcome", compact("missions"));
    }
}
