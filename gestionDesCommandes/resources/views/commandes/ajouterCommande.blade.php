<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter une Commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">Ajouter une Commande</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('commandes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="reference" class="form-label">Référence</label>
      <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference') }}" required>
    </div>

    <div class="mb-3">
      <label for="etat_commande" class="form-label">État de la Commande</label>
      <select class="form-select" id="etat_commande" name="etat_commande" required>
        <option value="valide" {{ old('etat_commande') == 'valide' ? 'selected' : '' }}>Valide</option>
        <option value="en_cours" {{ old('etat_commande') == 'en_cours' ? 'selected' : '' }}>En Cours</option>
        <option value="annule" {{ old('etat_commande') == 'annule' ? 'selected' : '' }}>Annulé</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="montant_total" class="form-label">Montant Total</label>
      <input type="number" class="form-control" id="montant_total" name="montant_total" value="{{ old('montant_total') }}" required>
    </div>

 

    <div class="mb-3">
      <label for="produits" class="form-label">Produits</label>
      <div id="produits">
        @foreach($produits as $produit)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="produit-{{ $produit->id }}" name="produits[{{ $produit->id }}][id]" value="{{ $produit->id }}">
            <label class="form-check-label" for="produit-{{ $produit->id }}">
              {{ $produit->designation }}
            </label>
            <input type="number" class="form-control mt-1" id="quantite-{{ $produit->id }}" name="produits[{{ $produit->id }}][quantite]" placeholder="Quantité">
          </div>
        @endforeach
      </div>
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">Utilisateur</label>
        <select class="form-select" id="user_id" name="user_id" required>
          @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->nom }}</option>
          @endforeach
        </select>
      </div>

    <button type="submit" class="btn btn-success">Ajouter</button>
    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
