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
        'numero_commande','quantity',
        'produits_id',
    'statut'];


    public function produits(){
        return $this->belongsTo(Produits::class,'produits_id','id');
    }
}
