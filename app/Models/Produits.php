<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $table  = 'produits';

    protected $fillable = [
        'id',
        'nom',
        'prix',
    'categories_id'];


    public function categorie(){
        return $this->belongsTo(Categories::class,'categories_id','id');
    }
}
