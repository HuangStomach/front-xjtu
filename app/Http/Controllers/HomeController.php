<?php

namespace App\Http\Controllers;

use App\Image;
use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
 //       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $navs = Link::where('type', 1)->get();
        return view('home', [
            'navs' => $navs,
            'images' => $images,
        ]);
    }
}
