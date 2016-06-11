<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function add () {
        return view('image/add', [
            'title' => '图片轮播',
            'action' => '/image/add',
            'active' => 'image',
        ]);
    }
}
