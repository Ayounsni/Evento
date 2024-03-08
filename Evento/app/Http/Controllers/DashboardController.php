<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::id()){
            $user=auth()->user()->role ;
            $userId=auth()->id();
            $ban=auth()->user()->bannir ;
            if($ban == 1) {
                Auth::logout();
                return redirect()->route('login')->with('error',"Votre compte est actuellement suspendu en raison d'une violation des politiques.");  
            }elseif($user == 'user'){
                return redirect()->Route('user');              
            }elseif($user == 'admin'){ 
                    return redirect()->Route('admin');  
            }else{
                return redirect()->Route('organisateur');  
            }
        }
       }
}
