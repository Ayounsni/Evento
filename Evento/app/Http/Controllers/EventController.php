<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create(){
        $categories=Categorie::all();
        return view('organisateur.addEvent',compact('categories'));    
    }
    public function store(Request $request){
        $id=auth()->id();

        $request->validate([
            'titre'=> 'required|min:3',
            'date'=> 'required|date|after:now',
            'categorie'=> 'required',
            'nombre'=> 'required|regex:/^-?\d+$/',
            'lieu'=> 'required|min:3',
            'description'=>'required|min:20',
            'validation'=>'required',
        ],[
            'nombre.regex'=>'Veuillez entrez un nombre entier',
            ]);


        Evenement::create([
            'id_user'=>$id,
            'id_categorie'=> $request->categorie,
            'titre'=> $request->titre,
            'description'=> $request->description,
            'date'=> $request->date,
            'lieu'=> $request->lieu,
            'place'=> $request->nombre,
            'validation'=> $request->validation,
        ]);
        return redirect()->Route('organisateur')->with('success', 'Evénement ajouter avec succés'); 
    }
    public function edit(Evenement $event)
    {
        $categories=Categorie::all();
       return view('organisateur/editEvent',compact('event','categories'));

    }
    public function update(Request $request, Evenement $event){
        $request->validate([
            'titre'=> 'required|min:3',
            'date'=> 'required|date|after:now',
            'categorie'=> 'required',
            'nombre'=> 'required|regex:/^-?\d+$/',
            'lieu'=> 'required|min:3',
            'description'=>'required|min:20',

        ],[
            'nombre.regex'=>'Veuillez entrez un nombre entier',
        ]);
    
        $event->update([
            'id_categorie'=> $request->categorie,
            'titre'=> $request->titre,
            'description'=> $request->description,
            'date'=> $request->date,
            'lieu'=> $request->lieu,
            'place'=> $request->nombre,
        ]);
    
        return redirect()->route('organisateur')->with('success', 'Événement mis à jour avec succès'); 
    }
    public function destroy(Evenement $event){
        $event->delete();
        return redirect()->route('organisateur')->with('delete', 'Événement supprimer avec succès'); 
    }
    public function index(){
        $evenements = Evenement::orderBy('created_at', 'desc')->get();
        return view('admin/evenements',compact('evenements'));
    }
    public function accepter(Evenement $event){
 
        $event->update([
            'status'=> 'confirmer',
        ]);
    
        return redirect()->route('events')->with( 'success', "L'événement a été confirmer avec succés"); 
    }
    public function rejeter(Evenement $event){
 
        $event->update([
            'status'=> 'rejeter',
        ]);
    
        return redirect()->route('events')->with( 'bloc', "L'événement a été rejeter"); 
    }
    public function indexx(Request $request){

        $categories = Categorie::all();
        $categorieId = $request->categorie;
        $cat = Categorie::where('id',$categorieId)->first();
        $termeRecherche = $request->search ;
        if($termeRecherche){

            $evenements = Evenement::where('titre', 'like', '%' . $termeRecherche . '%')->paginate(100);
            return view('user/home',compact('evenements','categories'));
        }
        elseif($categorieId){
            if($categorieId =='all'){
                $evenements = Evenement::where('status', 'confirmer')->paginate(4);
                return view('user/home',compact('evenements','categories'));
            }else{
            $evenements = Evenement::where('id_categorie', $categorieId)->where('status', 'confirmer')->paginate(100);
            return view('user/home',compact('evenements','categories','cat'));
        }
        }else{
        $evenements = Evenement::where('status', 'confirmer')->paginate(4);
        return view('user/home',compact('evenements','categories'));
    }
    }
    public function show(Evenement $event){

        return view('user/evenement',compact('event'));
    }
    
}
