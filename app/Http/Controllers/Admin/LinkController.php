<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Storage;
use App\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function add () {
        return view('link/link', [
            'title' => '添加连接',
            'action' => 'link/add',
            'active' => 'link',
        ]);
    }

    public function postAdd (Request $request) {
        $validator = $this->validate($request, [
            'title' => 'required',
            'href' => 'required',
            'icon' => 'mimes:jpg,jpeg,bmp,png,gif',
        ]);

        $link = new Link;
        $link->title = $request->get('title');
        $link->href = $request->get('href');
        $link->type = $request->get('type');

        if ($link->save()) {
            if ($request->hasFile('icon')) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $path = 'icon/' . time() . '.' . $extension;
                Storage::put(
                    $path,
                    file_get_contents($file->getRealPath())
                );
                $link->icon = $path;
                $link->save();
            }
            return redirect('admin/link')->with('message', '保存成功');
        }
        else {
            return redirect('admin/link')->with('message', '保存失败，请联系管理员');
        }
    }

    public function postDelete (Request $request) {
        $link = Link::find($request->get('id'));
        Storage::delete($link->icon);
        $link->delete();
        return redirect('admin/image')->with('message', '删除成功');
    }
}
