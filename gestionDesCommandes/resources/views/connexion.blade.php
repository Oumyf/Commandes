<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Connexion</h1>
            </div>
            <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('connexion') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="adiaoumyf@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="mot_de_passe" class="form-label">Mot de passe</label>
                        <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" required>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
