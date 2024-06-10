<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'designation','prix_unitaire','image','etat_produit','categorie_id','user_id'];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantite')->withTimestamps();
    }


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user() // Correction du nom de la méthode
    {
        return $this->belongsTo(User::class);
    }
}
