<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $users=User::where('role','user')->get();
        $organisateurs=User::where('role','organisateur')->get(); 
       return view('admin/users',compact('users','organisateurs'));
    }
    public function autoriser(User $user){
 
        $user->update([
            'bannir'=> 0,
        ]);
    
        return redirect()->route('users')->with( 'success', 'Le compte a été réactivé avec succès.'); 
    }
    public function ban(User $user){
 
        $user->update([
            'bannir'=> 1,
        ]);
    
        return redirect()->route('users')->with('bloc', 'Le compte a été suspendu'); 
    }

    public function test(){
        $evenements = Evenement::all();

        foreach($evenements as $evenement){
        $evenement->reservations;

        dd($evenement->reservations);
    }
        
        
    }

    
}
