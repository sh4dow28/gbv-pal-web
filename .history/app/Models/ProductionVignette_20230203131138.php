<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionVignette extends Model
{
    use HasFactory;
    protected $table = 'vignettes_production';
    protected $fillable = [
        'idProd',
        'typeVeh',
        'coulVeh',
        'immaVeh',
    ];
    public function production()
    {
        return $this->belongsTo(DemandeProduction::class);
    }
}
