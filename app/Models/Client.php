<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'nom','telephone','email','pays','identifiant','actif'
    ];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
