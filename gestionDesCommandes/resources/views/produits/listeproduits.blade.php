<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD IN LARAVEL 11</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
        background-color: #f8f9fa;
        margin: 20px;
        font-family: Arial, sans-serif;
    }
    .table-container {
        margin: 20px 0;
    }
    .table {
        background-color: #ffffff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    .btn-group .btn {
        margin: 0 5px;
    }
    .btn-group {
        display: flex;
        justify-content: center;
    }
    .container {
        max-width: 1400px;
        margin: auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .header-title {
        color: #007bff;
        margin-bottom: 20px;
    }
    .alert {
        margin-top: 10px;
    }
    .create-btn {
        background-color: #007bff;
        border-color: #007bff;
    }
    .create-btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
</head>
<body>

  
  <div class="container text-center">
    
    <div class="row">
      <div class="col">
        <h1>Liste des produits de Kane et Frères</h1>
        <hr>
        <a href="/produit/ajouter" class="btn btn-primary mb-3">Ajouter des produits</a>
        <hr>
        @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Image</th>
                <th>Désignation</th>
                <th>Référence</th>
                <th>Date de création</th>
                <th>État</th>
                <th>Prix Unitaire</th>
                <th>Utilisateur</th>
                <th>Catégorie</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($produits as $produit)
                <tr>
                  <td><img src="{{ $produit->image }}" alt="{{ $produit->designation }}" height="40"></td>
                  <td>{{ $produit->designation }}</td>
                  <td>{{ $produit->reference }}</td>
                  <td>{{ $produit->created_at }}</td>
                  <td>{{ $produit->etat_produit }}</td>
                  <td>{{ $produit->prix_unitaire }}</td>
                  <td>{{ $produit->user->nom }}</td>
                  <td>{{ $produit->categorie->libelle }}</td>
                  <td>
                    <a href="/produit/modifier/{{$produit->id}}" class="btn btn-info">Modifier</a>

                    <form action="{{ route('produit.supprimer', $produit->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('produit.details', $produit->id) }}" class="btn btn-primary">Voir les détails</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
