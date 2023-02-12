<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeBadgeVisiteur extends Model
{
    use HasFactory;
    protected $table = 'demande_badge_visiteurs';

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }

    public function badge()
    {
        return $this->belongsTo(BadgeVisiteur::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
}
