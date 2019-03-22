<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $producers = [
            'Produtora #1',
            'Produtora #2',
            'Produtora #3',
        ];
        $dvds = [
            [
                'id' => 1,
                'year' => 2019,
                'title' => 'Episode IV – A New Hope',
                'synopsis' => 'Lorem ipsum'
            ],
            [
                'id' => 2,
                'year' => 2018,
                'title' => 'Episode V – The Empire Strikes Back',
                'synopsis' => 'Lorem ipsum'
            ],
            [
                'id' => 3,
                'year' => 2017,
                'title' => 'Episode VI – Return of the Jedi',
                'synopsis' => 'Lorem ipsum'
            ],
        ];

        $legends = [
            'Português',
            'Inglês',
            'Espanhol',
            'Italiano',
            'Francês',
            'Klingon',
        ];

        foreach($producers as $producerName) {
            $producer = new \App\Producer();
            $producer->name = $producerName;
            $producer->save();
        }

        foreach($dvds as $dvdObj) {
            $dvd = new \App\DVD();
            $dvd->producer_id = $dvdObj['id'];
            $dvd->year = $dvdObj['year'];
            $dvd->title = $dvdObj['title'];
            $dvd->synopsis = $dvdObj['synopsis'];
            $dvd->save();
        }

        foreach($legends as $legendName) {
            $legend = new \App\Legend();
            $legend->language = $legendName;
            $legend->save();
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
