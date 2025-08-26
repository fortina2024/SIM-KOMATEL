<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetClient extends Model
{
    protected $table="assets";

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

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function site_client()
    {
        return $this->hasMany(SiteClient::class, 'nom');
    }
}
