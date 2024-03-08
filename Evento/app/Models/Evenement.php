<?php

namespace App\Models;

use App\Models\User;
use App\Models\Categorie;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_categorie',
        'titre',
        'description',
        'date',
        'lieu',
        'place',
        'validation',
        'status',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'id_categorie');
    }
}
