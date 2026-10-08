<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = ["id" , "titre"];


    function User(){
        return $this->belongsTo(User::class);
    }

    function Tache(){
        return $this->hasmany(Tache::class);
    }

}
