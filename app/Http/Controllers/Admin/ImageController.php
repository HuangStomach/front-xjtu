<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Storage;
use App\Image;
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

    public function postAdd (Request $request) {
        $validator = $this->validate($request, [
            'carousel' => 'required|mimes:jpg,jpeg,bmp,png,gif',
        ]);

        if ($request->hasFile('carousel')) {
            $file = $request->file('carousel');
            $extension = $file->getClientOriginalExtension();
            $path = 'carousel/' . time() . '.' . $extension; 

            $image = new Image;
            $image->path = $path;

            if ($image->save()) {
                Storage::put(
                    $path,
                    file_get_contents($file->getRealPath())
                );
                return redirect('admin/image')->with('message', '上传成功');
            }
        }
        else {
            return redirect('admin/image')->with('message', '上传失败，请联系管理员');
        }
    }

    public function postDelete (Request $request) {
        $image = Image::find($request->get('id'));
        Storage::delete($image->path);
        $image->delete();
        return redirect('admin/image')->with('message', '删除成功');
    }
}
