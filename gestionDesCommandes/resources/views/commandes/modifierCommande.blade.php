<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajouter/Modifier une Commande</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">{{ isset($commande) ? 'Modifier' : 'Ajouter' }} une Commande</h1>

  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ isset($commande) ? route('commandes.update', $commande->id) : route('commandes.store') }}" method="POST">
    @csrf
    @if(isset($commande))
      @method('PUT')
    @endif

    <div class="mb-3">
      <label for="reference" class="form-label">Référence</label>
      <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference', $commande->reference ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label for="etat_commande" class="form-label">État de la Commande</label>
      <select class="form-select" id="etat_commande" name="etat_commande" required>
        <option value="valide" {{ old('etat_commande', $commande->etat_commande ?? '') == 'valide' ? 'selected' : '' }}>Valide</option>
        <option value="en_cours" {{ old('etat_commande', $commande->etat_commande ?? '') == 'en_cours' ? 'selected' : '' }}>En Cours</option>
        <option value="annule" {{ old('etat_commande', $commande->etat_commande ?? '') == 'annule' ? 'selected' : '' }}>Annulé</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="montant_total" class="form-label">Montant Total</label>
      <input type="number" class="form-control" id="montant_total" name="montant_total" value="{{ old('montant_total', $commande->montant_total ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label for="date_commande" class="form-label">Date de la Commande</label>
      <input type="datetime-local" class="form-control" id="date_commande" name="date_commande" value="{{ old('date_commande', $commande->date_commande ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label for="produits" class="form-label">Produits</label>
      <select class="form-select" id="produits" name="produits[]" multiple required>
        @foreach($produits as $produit)
          <option value="{{ $produit->id }}" {{ isset($commande) && $commande->produits->contains($produit->id) ? 'selected' : '' }}>
            {{ $produit->designation }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($commande) ? 'Mettre à jour' : 'Ajouter' }}</button>
    <a href="{{ route('commandes.index') }}" class="btn btn-secondary">Retour</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
