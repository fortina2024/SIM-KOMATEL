<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    protected $fillable=[
        'nom','telephone','email','pays','identifiant','actif'
    ];
}
