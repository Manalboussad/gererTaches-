<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ["user_id", "titre", "description", "status", "projets_id"];


    function User(){
        return $this->belongsTo(Tache::class);
    }

    function Projet(){
        return $this->belongsTo(User::class);
    }
}


