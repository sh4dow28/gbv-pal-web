<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;
    protected $table = 'tbl_visiteur';

    public function demandes()
    {
        return $this->hasMany(DemandeBadgeVisiteur::class);
    }
}
