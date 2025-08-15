<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    protected $fillable = [
        'msisdn',
        'iccid',
        'bundel',
        'active',
        'profil_sim_id',
        'operateur_id',
        'zone_operation_id',
        'date_activation',
        'date_expiration',
    ];

    // Relation avec l'opérateur
    public function operateur()
    {
        return $this->belongsTo(Operateur::class);
    }

    // Relation avec l'organisation
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    // Relation avec le profil SIM
    public function profil_sim()
    {
        return $this->belongsTo(ProfilSim::class);
    }

    // Optionnel : relation avec zone d'opération
    public function zone_operation()
    {
        return $this->belongsTo(ZoneOperation::class);
    }
}
