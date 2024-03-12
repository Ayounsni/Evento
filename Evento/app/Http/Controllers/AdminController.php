<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $organisateur=User::where('role','organisateur')->count();
        $user=User::where('role','user')->count();
        $evenement=Evenement::where('status','confirmer')->count();
        $reservation=Reservation::where('status','confirmer')->count();
        $organisateurs = Evenement::select('id_user', DB::raw('COUNT(*) as total_evenements'))
        ->where('status', 'confirmer')
        ->groupBy('id_user')
        ->orderByDesc('total_evenements')
        ->limit(3)
        ->get();
        $users = Reservation::select('id_user', DB::raw('COUNT(*) as total_reservations'))
        ->where('status', 'confirmer')
        ->groupBy('id_user')
        ->orderByDesc('total_reservations')
        ->limit(3)
        ->get();

        return view('admin/bord',compact('organisateur','user','evenement','reservation','organisateurs','users'));
    }
}
