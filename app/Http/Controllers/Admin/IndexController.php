<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
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
        return view('admin/image', [
            'active' => 'image',
        ]);
    }

}
