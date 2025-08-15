<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSim extends Model
{
    protected $table='profils_sims';

    protected $fillable=[
        'type'
    ];

    public function sim()
    {
        return $this->hasMany(Sim::class, 'profil_sim_id');
    }
}
