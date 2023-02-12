<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    protected $table = 'tbl_societe';
    protected $fillable = [
        'idSoc',
        'raison_social',
        'domaineActivite',
        'telSoc',
        'mobileSoc',
        'emailSoc',
        'webSoc',
        'adrSoc',
        'qrtSoc',
        'villSoc',
        'paysSoc',
        'numFisc',
        'idRep',
    ];

    public function representant()
    {
        return $this->hasOne(RepresentantSociete::class);
    }

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
