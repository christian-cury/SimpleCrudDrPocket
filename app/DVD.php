<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVD extends Model
{
    //

    public function producer() {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

    public function legends() {
        return DVDLegend::where('dvd_id', '=', $this->id)->get();
//        return $this->hasMany(DVDLegend::class, 'dvd_id');
    }
}
