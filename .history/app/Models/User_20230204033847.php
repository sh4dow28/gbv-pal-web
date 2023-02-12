<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'tbl_utilisateur';
    protected $guarded = ['codeUtil'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codeUtil',
        'nomUtil',
        'droitUtil',
        'pseudoUtil',
        'emailUtil',
        'mdpUtil',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'mdpUtil', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['mdpUtil'] = DB::raw("password('$password')");
    }
    public function getAuthPassword()
    {
        return $this->mdpUtil;
    }

    public function demandes()
    {
        return $this->hasMany(DemandeBadgeVisiteur::class);
    }

    public function demandes_production()
    {
        return $this->hasMany(DemandeProduction::class);
    }
}
