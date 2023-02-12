<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;
    protected $table = 'tbl_societe';

    public function representant()
    {
        return $this->hasOne(RepresentantSociete::class);
    }

    public function employes()
    {
        return $this->hasMany(Employe::class);
    }
}
