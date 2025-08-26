<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'nom',
        'marque',
        'imei',
        'numero_serie',
        'active',
        'type_device_id',
        'parc_sim_id',
        'date_mise_en_service_device',
    ];

    public function parc_de_sim()
    {
        return $this->belongsTo(ParcDeSim::class);
    }

    public function type_device()
    {
        return $this->belongsTo(TypeDevice::class);
    }
}
