<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['reference','montant_total','etat_commande'];

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite')->withTimestamps();
    }
}
