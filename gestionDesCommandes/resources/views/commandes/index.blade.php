<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Liste des Commandes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">Liste des Commandes</h1>
  <a href="{{ route('commandes.create') }}" class="btn btn-primary mb-3">Ajouter une Commande</a>

  @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif

  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Référence</th>
        <th>État de la Commande</th>
        <th>Montant Total</th>
        <th>Date de la Commande</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($commandes as $commande)
      <tr>
        <td>{{ $commande->id }}</td>
        <td>{{ $commande->reference }}</td>
        <td>{{ $commande->etat_commande }}</td>
        <td>{{ $commande->montant_total }}</td>
        <td>{{ $commande->created_at }}</td>
        <td>
          <a href="{{ route('commandes.edit', $commande->id) }}" class="btn btn-info btn-sm">Modifier</a>
          <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">Supprimer</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
