<?php

namespace App\Http\Controllers;

use App\DVD;
use App\DVDLegend;
use App\Legend;
use App\Producer;
use Illuminate\Http\Request;

class DVDResource extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.dvd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $producer = new Producer();
        $producer->name = $request->producer;
        $producer->save();
        $dvd = new DVD();
        $dvd->producer_id = $producer->id;
        $dvd->year = $request->year;
        $dvd->title = $request->title;
        $dvd->synopsis = $request->synopsis;
        $dvd->save();

        $legends = Legend::inRandomOrder()->limit(rand(1,6))->get();
        foreach($legends as $legend) {
            $dvdLegend = new DVDLegend();
            $dvdLegend->dvd_id = $dvd->id;
            $dvdLegend->legend_id = $legend->id;
            $dvdLegend->save();
        }

        return redirect()->route('home')->with('success', 'DVD adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
