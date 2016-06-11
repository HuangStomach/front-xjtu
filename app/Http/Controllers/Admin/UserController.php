<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function add () {
        return view('user/user', [
            'title' => '添加用户',
            'action' => '/user/add',
            'active' => 'user',
        ]);
    }

    public function postAdd (Request $request) {
        $validator = $this->validate($request, [
            'token' => 'required|unique:users,token|max:255',
            'name' => 'required',
            'password' => 'required',
            'confirm' => 'required|same:password'
        ]);
       
        $user = new User;
        $user->token = $request->get('token');
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        
        if ($user->save()) {
            return redirect('admin/user')->with('message', '添加成功');
        }
        else {    
            return redirect('admin/user')->with('message', '添加失败，请联系管理员');
        }
    }

    public function update ($id) {
        $user = User::find($id);
        return view ('user/user', [
            'user' => $user,
            'title' => '修改用户',
            'action' => '/user/update',
            'active' => 'user',
        ]);
    }

    public function postUpdate (Request $request) {
        $validator = $this->validate($request, [
            'token' => 'required|unique:users,token|max:255',
            'name' => 'required',
            'password' => 'required',
            'confirm' => 'required|same:password'
        ]);
       
        $user = User::find();
        $user->token = $request->get('token');
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        
        if ($user->save()) {
            return redirect('admin/user')->with('message', '修改成功');
        }
        else {    
            return redirect('admin/user')->with('message', '修改失败，请联系管理员');
        }
    }

    public function postDelete (Request $request) {
        User::find($request->get('id'))->delete();    
        return redirect('admin/user')->with('message', '删除成功');
    }
}
