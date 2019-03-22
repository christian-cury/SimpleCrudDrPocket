<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateDvdLegends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $dvds = \App\DVD::all();
        foreach($dvds as $dvd){
            $legends = \App\Legend::inRandomOrder()->limit(rand(1,6))->get();
            foreach($legends as $legend) {
                $dvdLegend = new \App\DVDLegend();
                $dvdLegend->dvd_id = $dvd->id;
                $dvdLegend->legend_id = $legend->id;
                $dvdLegend->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
