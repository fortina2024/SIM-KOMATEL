<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcDeSim extends Model
{
    protected $fillable = [
        'msisdn',
        'iccid',
        'imsi',
        'active',
        'profil_sim_id',
        'operateur_id',
        'bundel_id',
        'date_activation',
        'date_mise_en_service',
    ];

    // Relation avec l'opérateur
    public function operateur()
    {
        return $this->belongsTo(Operateur::class);
    }

    // Relation avec le profil SIM
    public function profil_sim()
    {
        return $this->belongsTo(ProfilSim::class);
    }

    // Optionnel : relation avec zone d'opération
    public function bundel()
    {
        return $this->belongsTo(Bundel::class);
    }

    public function siteClients()
    {
        return $this->hasMany(SiteClient::class);
    }
}
