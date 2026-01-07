<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = [
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

    public function mission()
    {
        return $this->belongsTo(Mission::class, 'mission_id');
    }
    public function executant()
    {
        return $this->belongsTo(User::class, 'executant_id');
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
