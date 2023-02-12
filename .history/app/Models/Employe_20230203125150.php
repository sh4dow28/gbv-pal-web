<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'tbl_employe';

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }

    public function productions()
    {
        return $this->hasMany(DemandeProduction::class);
    }
}
