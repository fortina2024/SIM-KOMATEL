<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    protected $fillable=[
        'nom','telephone_1','email_1','telephone_2','email_2','pays','identifiant','actif'
    ];
}
