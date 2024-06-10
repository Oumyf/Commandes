<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{



    public function ajouterproduit()
    {
        $categories = Categorie::all(); // Récupère toutes les catégories de la base de données
        $users = User::all(); // Récupère tous les utilisateurs de la base de données
        return view('produits.ajouterproduit', compact('categories', 'users'));
    }

  
    
    public function ajouterproduitTraitement(Request $request)
    {
        $validatedData = $request->validate([
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'prix_unitaire' => 'required|integer',
            'image' => 'required',
            'etat_produit' => 'required|in:disponible,en_rupture,en_stock',
            'categorie_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);
    

    
        // Utilisez $imagePath pour stocker le chemin de l'image dans la base de données
    
        Produit::create($validatedData);
    
        return redirect()->back()->with('status', "Le produit a été ajouté avec succès");
    }
    

    public function Listeproduit()
    {
        $produits = Produit::all();
        return view('produits.listeproduits', compact('produits'));
    }
    

    public function afficher_details($id)
    {
        $categories = Categorie::all();
        $produit = Produit::findOrFail($id);
        return view('produits.details', compact('produit', 'categories'));
    }

    public function modifierproduit($id)
    {
        $etatProduits = Produit::distinct()->pluck('etat_produit');
        $categories = Categorie::all();
        $users = User::all();
        $produit = Produit::findOrFail($id);
        return view('produits.modifierproduit', compact('categories', 'produit', 'etatProduits','users'));
    }

    public function modifierproduitTraitement(Request $request, $id)
    {
        $request->validate([
            'reference' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'prix_unitaire' => 'required|integer',
            'etat_produit' => 'required|in:disponible,en_rupture,en_stock',
            'image' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);
    
        $produit = Produit::findOrFail($id);
        $produit->reference = $request->reference;
        $produit->designation = $request->designation;
        $produit->prix_unitaire = $request->prix_unitaire;
        $produit->etat_produit = $request->etat_produit;
        $produit->categorie_id = $request->categorie_id;
    
        if ($request->hasFile('image')) {
            // Handle the image upload here
            $produit->image = $request->file('image')->store('images');
        }
    
        $produit->update();
    
        return redirect()->route('produit.liste')->with('status', "Le produit a bien été modifié avec succès");
    }
    
    
 
  

    public function supprimerproduit($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->back()->with('status', "Le produit a été supprimé avec succès");
    }
}


