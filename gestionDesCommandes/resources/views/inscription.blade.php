<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Inscription</h1>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('inscription') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Adia Oumy Fall" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="adiaoumyf@gmail.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="mot_de_passe" class="form-label">Mot de Passe</label>
                                <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" required>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button class="btn btn-primary">inscription</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

