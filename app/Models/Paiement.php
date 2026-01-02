<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
      protected $fillables = [
        'mission_id',
        'client_id',
        'executant_id',
        'montant',
        'commission_pourcentage',
        'commission_montant',
        'montant_net',
        'status',
        'liberable',
    ];

    public function mission(){
        return $this->belongsTo(Mission::class);
    }
}
