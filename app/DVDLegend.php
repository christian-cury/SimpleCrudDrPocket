<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DVDLegend extends Model
{
    //
    public function legend() {
        return Legend::where('id', '=', $this->legend_id)->first();
//        return $this->belongsTo(Legend::class, 'legend_id');
    }

    public function dvd() {
        return DVD::where('id', '=', $this->dvd_id)->first();
//        return $this->belongsTo(DVD::class, 'id', 'dvd_id');
    }
}
