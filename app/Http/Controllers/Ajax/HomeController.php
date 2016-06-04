<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function eqStatus() {
        return view('home/eqStatus');
    }
 
    public function eqRate() {
        return view('home/eqRate');
    }

}
