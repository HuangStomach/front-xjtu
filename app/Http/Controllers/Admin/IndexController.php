<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Storage;
use App\User;
use App\Image;
use App\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    function user () {
        $users = User::all();
        return view('admin/user', [
            'active' => 'user',
            'users' => $users
        ]);
    }

    function image () {
        $images = Image::all();
        return view('admin/image', [
            'active' => 'image',
            'images' => $images,
        ]);
    }

    public function link () {
        $navs = Link::where('type', 1)->get();
        $links = Link::where('type', 2)->get();
        return view('admin/link', [
            'navs' => $navs,
            'links' => $links,
            'active' => 'link',
        ]);
    }


}
