<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashController extends Controller
{
    //
    public function home() {
        return view('dashboard.home');
    }
}
