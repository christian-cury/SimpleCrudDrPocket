<?php

namespace App\Http\Controllers;

use App\DVD;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function home() {
        $dvds = DVD::all();
        return view('home', compact('dvds'));
    }


}
