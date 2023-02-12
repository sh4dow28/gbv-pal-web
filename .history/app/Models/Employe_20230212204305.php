<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'tbl_employe';
    protected $fillable = [
        'nomEmp',
        'prenomEmp',
        'pereEmp',
        'mereEmp',
        'dobEmp',
        'pobEmp',
        'nationEmp',
        'sexeEmp',
        'adrEmp',
        'telEmp',
        'posteEmp',
        'typeIDEmp',
        'numIDEmp',
        'expIDEmp',
        'idSoc',
    ];

    public function societe()
    {
        return $this->belongsTo(Societe::class, 'idSoc', 'idSoc');
    }

    public function productions()
    {
        return $this->hasMany(DemandeProduction::class);
    }
}
