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


}
