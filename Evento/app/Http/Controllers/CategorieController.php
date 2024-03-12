<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Evenement;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::where('nom', '!=', 'generale')->get();
        return view('admin/categories',compact('categories'));
    }
    public function create(){
        return view('admin/addCat');
    }
    public function store(Request $request){
        $id=auth()->id();
        $request->validate([
            'nom'=> 'required|min:2|unique:categories,nom',
        ]);
        Categorie::create([
            'id_user'=>$id,
            'nom'=>$request->nom,
        ]);
        return redirect()->Route('categories')->with('success', 'Catégorie ajouter avec succés');
    }
    public function edit(Categorie $categorie){

        return view('admin/editCat',compact('categorie'));
    }
    public function update(Request $request, Categorie $categorie){
        $request->validate([
            'nom'=> 'required|min:2|unique:categories,nom',
        ]);
    
        $categorie->update([
            'nom'=> $request->nom,
        ]);
        return redirect()->Route('categories')->with('success', 'Catégorie modifier avec succés');
    }
    public function destroy(Categorie $categorie){
        $categorieParDefaut = Categorie::where('nom', 'Generale')->first();

        Evenement::where('id_categorie', $categorie->id)
         ->update(['id_categorie' => $categorieParDefaut->id]);
        $categorie->delete();
        return redirect()->route('categories')->with('bloc', 'Catégorie supprimer avec succès'); 
    }
}
