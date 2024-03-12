<?php

namespace App\Models;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_evenement',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class,'id_evenement');
    }
}
