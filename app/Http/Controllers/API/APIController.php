<?php

namespace App\Http\Controllers\API;

use App\DVD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    //
    public function legend($id) {
        $dvd = DVD::find($id);

        $legends = array();

        foreach($dvd->legends() as $dvdLegend) {
            $legends[] = $dvdLegend->legend()->language;
        }

        if(count($legends) == 0) $legends = 'Não há legendas disponíveis';

        $response = [
            'code' => 200,
            'data' => $legends
        ];
        return response()->json($response);
    }
}
