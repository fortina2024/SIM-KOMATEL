<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
    public function sim()
    {
        return $this->belongsTo(Sim::class);
    }
}
