<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteClient extends Model
{
    protected $fillable=[
        'nom','pays','client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
