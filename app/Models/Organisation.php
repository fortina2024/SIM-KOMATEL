<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable=[
        'nom','telephone','email','adresse','identifiant','actif'
    ];
}
