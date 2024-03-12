<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function index(){
        $id=auth()->id();
        $reservations=Reservation::where('id_user',$id)->orderBy('created_at', 'desc')->paginate(6);
        return view('user/reservation',compact('reservations'));
    }
    public function reservation(Evenement $event){
        $id=auth()->id();
        if($event->validation == 'automatique'){
            if ($event->place > 0) {    
                $event->decrement('place');
                Reservation::create([
                    'id_user'=>$id,
                    'id_evenement'=>$event->id,
                    'status'=>'confirmer'
                ]);
                return redirect()->Route('reservation')->with('success', 'Votre ticket a été réservé avec succès'); 
            }else{
                return redirect()->Route('user')->with('delete', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
            }

        }
        Reservation::create([
            'id_user'=>$id,
            'id_evenement'=>$event->id,
        ]);
        return redirect()->Route('reservation')->with('success', 'Votre ticket a été réservé avec succès');
    }
    public function ticket(Reservation $reservation){

        return view('user/ticket',compact('reservation'));
    }
    public function accepter(Reservation $reservation){
        $place=$reservation->evenement->place;
        if ($place > 0) {    
            $reservation->evenement->decrement('place');
            $reservation->update([
                'status'=> 'confirmer',
            ]);
            return redirect()->Route('validation')->with('success', 'La réservation a été confirmé avec succès'); 
        }else{
            return redirect()->Route('validation')->with('delete', 'il n\'y a plus de places disponibles pour cet événement.');
        }

    }
    public function rejeter(Reservation $reservation){

        $reservation->update([
            'status'=> 'rejeter',
        ]);

        return redirect()->Route('validation')->with('delete', 'La réservation a été rejeté');        
    }


}

