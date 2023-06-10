<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function EditAbout()
    {
        $about = About::find(1);
        return view('admin.about.edit_about', compact('about'));
    }


    public function UpdateAbout(Request $request)
    {
        $data = About::find(1);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->home_description = $request->home_description;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink($data->photo);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/about'), $filename);
            $data['photo'] = 'upload/about/'. $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'About Page Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('edit.about')->with($notification);
    }
}
