<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'marque',
        'model',
        'immatriculation',
        'numero_flotte',
        'type_asset_id',
        'annee_fab',
        'actif',
        'site_client_id',
        'device_id',
        'client_id'
    ];

    public function type_asset()
    {
        return $this->belongsTo(TypeAsset::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function site_client()
    {
        return $this->belongsTo(SiteClient::class);
    }
}
