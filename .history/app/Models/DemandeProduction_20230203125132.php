<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeProduction extends Model
{
    use HasFactory;
    protected $table = 'tbl_demande_production';

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function badges()
    {
        return $this->hasMany(ProductionBadge::class);
    }

    public function vignettes()
    {
        return $this->hasMany(ProductionVignette::class);
    }
}
