<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('produits')->get();
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $produits = Produit::all();
        $users = User::all(); // Assuming you have users associated with the command.
        return view('commandes.ajouterCommande', compact('produits', 'users'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'reference' => 'required|string|max:255',
        'etat_commande' => 'required|in:valide,en_cours,annule',
        'montant_total' => 'required|numeric',
        'produits' => 'required|array',
        'produits.*.id' => 'required|exists:produits,id',
        'produits.*.quantite' => 'required|integer|min:1',
        'user_id' => 'required|exists:users,id', // Add validation for user_id
    ]);

    $commande = Commande::create([
        'reference' => $validatedData['reference'],
        'etat_commande' => $validatedData['etat_commande'],
        'montant_total' => $validatedData['montant_total'],
        'date_commande' => $validatedData['created_at'],
        'user_id' => $validatedData['user_id'], // Set user_id
    ]);

    foreach ($validatedData['produits'] as $produit) {
        $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
    }

    return redirect()->route('commandes.index')->with('status', 'Commande ajoutée avec succès.');
}

    public function edit(Commande $commande)
    {
        $produits = Produit::all();
        return view('commandes.modifierCommande', compact('commande', 'produits'));
    }

    public function update(Request $request, Commande $commande)
    {
        $validatedData = $request->validate([
            'reference' => 'required|string|max:255',
            'etat_commande' => 'required|in:valide,en_cours,annule',
            'montant_total' => 'required|numeric',
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|integer|min:1',
        ]);

        $commande->update([
            'reference' => $validatedData['reference'],
            'etat_commande' => $validatedData['etat_commande'],
            'montant_total' => $validatedData['montant_total'],
            'date_commande' => $validatedData['created_at'],
        ]);

        $commande->produits()->detach();
        foreach ($validatedData['produits'] as $produit) {
            $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
        }

        return redirect()->route('commandes.index')->with('status', 'Commande mise à jour avec succès.');
    }

    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index')->with('status', 'Commande supprimée avec succès !');
    }
    }
    

