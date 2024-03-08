<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function index(){
        $id=auth()->id();
        $evenements=Evenement::where('id_user',$id)->get();
        return view('organisateur/home',compact('evenements'));
    }

}
