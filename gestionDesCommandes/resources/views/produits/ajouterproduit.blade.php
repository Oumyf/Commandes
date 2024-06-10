<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un produit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
        margin: 20px;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa; /* gris clair */
    }
    .container {
        max-width: 600px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        font-weight: bold;
    }
    .btn-primary {
        background-color: #007bff; /* Bootstrap couleur primaire */
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Bleu sombre au survol */
        border-color: #004085;
    }
    .form-control {
        border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="form-container">
        <h1>Ajouter un produit</h1>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('produit.ajouterproduit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text" class="form-control" id="reference" name="reference" required>
          </div>
          <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
          </div>
          <div class="mb-3">
            <label for="prix_unitaire" class="form-label">Prix Unitaire</label>
            <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" name="image" required>
          </div>
          <div class="mb-3">
            <label for="etat_produit" class="form-label">État du produit</label>
            <select class="form-select" id="etat_produit" name="etat_produit" required>
              <option value="disponible">Disponible</option>
              <option value="en_rupture">En rupture</option>
              <option value="en_stock">En stock</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select class="form-select" id="categorie_id" name="categorie_id" required>
              @foreach($categories as $categorie)
              <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select class="form-select" id="user_id" name="user_id" required>
              @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->nom }}</option>
              @endforeach
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Ajouter un produit</button>
          </div>
        </form>
        <div class="mt-3 text-center">
          <a href="/produits" class="btn btn-danger">Retour</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
