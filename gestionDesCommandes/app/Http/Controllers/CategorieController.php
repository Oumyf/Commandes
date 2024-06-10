<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('/categories.index', compact('categories'));
    }

    public function create()
    {
        return view('/categories.ajouterCategorie');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
        ]);

        Categorie::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succés.');
    }

    public function show(Categorie $categorie)
    {
        return view('/categories.index', compact('categorie'));
    }

    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.modifierCategorie', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('status', 'Catégorie mise à jour avec succès');
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie supprimée avec succés .');
    }
}
