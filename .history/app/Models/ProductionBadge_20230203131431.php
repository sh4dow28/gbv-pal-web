<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionBadge extends Model
{
    use HasFactory;
    protected $table = 'badges_production';
    protected $fillable = [
        'idProd',
        'typeBadgeProd',
        'noBadge',
        'immaVeh',
    ];

    public function production()
    {
        return $this->belongsTo(DemandeProduction::class);
    }
}
