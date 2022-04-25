<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;

    protected $table  = 'commandes';

    protected $fillable = [
        'id',
        'numero_commande',
        'produits_id',
    'statut'];


    public function categorie(){
        return $this->belongsTo(Produits::class,'produits_id','id');
    }
}
