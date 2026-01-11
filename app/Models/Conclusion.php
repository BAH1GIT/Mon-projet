<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $fillable = [
        "mission_id",
        "client_id",
        "executant_id",
        "validation_client",
        "rating",
        "commentaire",
    ];
    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
    public function client()
    {
        return $this->belongsTo(User::class, "client_id");
    }
    public function executant()
    {
        return $this->belongsTo(User::class, "executant_id");
    }
}
