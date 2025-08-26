<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSim extends Model
{
    protected $table='profils_sims';

    protected $fillable=[
        'type'
    ];

    public function parc_de_sim()
    {
        return $this->hasMany(ParcDeSim::class);
    }
}
