<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeProduction extends Model
{
    use HasFactory;
    protected $table = 'tbl_demande_production';
    protected $fillable = [
        'zoneAcc',
        'typeProd',
        'statProd',
        'codeUtil',
        'idEmp',
    ];
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'idEmp', 'idEmp');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function badges()
    {
        return $this->hasMany(ProductionBadge::class, 'idProd', 'idProd');
    }

    public function vignettes()
    {
        return $this->hasMany(ProductionVignette::class, 'idProd', 'idProd');
    }
}
