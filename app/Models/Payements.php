<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payements extends Model
{
    use HasFactory;

    protected $table  = 'commande';

    protected $fillable = ['id','commandes_id'];


    public function commandes(){
        return $this->belongsTo(Commandes::class,'commandes_id','id');
    }
}
