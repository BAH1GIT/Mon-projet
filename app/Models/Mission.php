<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illnminate\Support\Facades\DB;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'title',
        'description',
        'budget_max',
        'budget_min',
        'date_limit',
        'status',
    ];


    public function scopeNonAttribuer($query){
        return $query->whereNull("executant_id");
    }
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function executant()
    {
        return $this->belongsTo(User::class, 'executant_id');
    }
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }
    public function payements()
    {
        return $this->hasOne(Paiement::class);
    }
    public function conclusion()
    {
        return $this->hasOne(Conclusion::class);
    }
}
