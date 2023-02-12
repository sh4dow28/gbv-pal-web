<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentantSociete extends Model
{
    use HasFactory;
    protected $table = 'tbl_rep_societe';

    public function societe()
    {
        return $this->belongsTo(Societe::class);
    }
}
