<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /*gris clair */
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
            background-color: #007bff; /* Bootstrap couleur primaire
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
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajout d'une catégorie</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" name="libelle" id="libelle" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Liste des catégories</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
