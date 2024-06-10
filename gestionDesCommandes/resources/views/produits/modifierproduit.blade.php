<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 600px;
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue for hover */
            border-color: #004085;
        }
        .form-control {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <h1>Modifier le produit</h1>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('produit.modifierproduit', $produit->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference" value="{{ $produit->reference }}" required>
                </div>
                <div class="form-group">
                    <label for="designation">Désignation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ $produit->designation }}" required>
                </div>
                <div class="form-group">
                    <label for="prix_unitaire">Prix Unitaire</label>
                    <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ $produit->prix_unitaire }}" required>
                </div>
                <div class="form-group">
                    <label for="etat_produit">État du Produit</label>
                    <select class="form-control" id="etat_produit" name="etat_produit" required>
                        <option value="">Sélectionnez un état</option>
                        @foreach($etatProduits as $etat)
                            <option value="{{ $etat }}" {{ $produit->etat_produit == $etat ? 'selected' : '' }}>{{ ucfirst($etat) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Veuillez mettre l'URL de l'image</label>
                    <input class="form-control" type="text" id="image" name="image" value="{{ $produit->image }}">
                </div>
                <div class="form-group">
                    <label for="categorie_id" class="form-label">Catégorie</label>
                    <select class="form-select" id="categorie_id" name="categorie_id" required>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" @if($produit->categorie_id == $categorie->id) selected @endif>{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id" class="form-label">Utilisateur</label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @if($produit->user_id == $user->id) selected @endif>{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
            <a href="{{ route('produit.liste') }}" class="btn btn-secondary mt-3">Retour à la liste des produits</a>
        </div>
        </section>
</body>
</html>