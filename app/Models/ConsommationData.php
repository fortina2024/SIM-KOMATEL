<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsommationData extends Model
{
    //
    public function sim()
    {
        return $this->belongsTo(Sim::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
