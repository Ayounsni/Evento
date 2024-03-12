<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function index(){
        $id=auth()->id();
        $evenements=Evenement::where('id_user',$id)->get();
        return view('organisateur/home',compact('evenements'));
    }
    public function indexx(){
        $id=auth()->id();
        $evenements=Evenement::where('id_user',$id)->where('validation','manuelle')->where('status','confirmer')->paginate(1);
        return view('organisateur/reservation',compact('evenements'));
    }
    public function statistique(){
        $id=auth()->id();
        $evenements = Evenement::where('id_user',$id)->where('status','confirmer')->get();

        $statistics = [];
    
        foreach ($evenements as $evenement) {
            $statistics[$evenement->id] = [
                'en_attente' => Reservation::where('id_evenement', $evenement->id)->where('status', 'en attente')->count(),
                'confirmees' => Reservation::where('id_evenement', $evenement->id)->where('status', 'confirmer')->count(),
                'rejetees' => Reservation::where('id_evenement', $evenement->id)->where('status', 'rejeter')->count(),
            ];
        }
        return view('organisateur/statistique',compact('statistics'));
    }

}
