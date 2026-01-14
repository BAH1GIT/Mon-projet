<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        "mission_id",
        "executant_id",
        "montant",
        "message",
        "status",
    ] ;

    public function executant(){
        return $this->belongsTo(User::class,    "executant_id");
    }

    public function mission(){
        return $this->belongsTo(Mission::class,"mission_id");
    }

    // public function client(){
    //     return $this->mission->client ?? null;
    // }
    public function paiement(){
        return $this->hasOne(Paiement::class,"mission_id","mission_id")
        ->where('paiements.executant_id','offres.executant_id');
    }
}
