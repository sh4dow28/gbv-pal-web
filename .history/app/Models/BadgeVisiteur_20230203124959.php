<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeVisiteur extends Model
{
    use HasFactory;
    protected $table = 'tbl_badge_visiteur';

    protected $fillable = [
        'typeVBadge',
        'numVBadge',
        'etatVBadge',
    ];

    public function demandes()
    {
        return $this->hasMany(DemandeBadgeVisiteur::class);
    }
}
