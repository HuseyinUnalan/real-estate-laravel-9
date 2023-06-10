<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class ServicesController extends Controller
{
    public function AllService()
    {
        $service = Services::latest()->get();
        return view('admin.service.all_service', compact('service'));
    }

    public function AddService()
    {
        return view('admin.service.add_service');
    }

    public function StoreService(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(870, 450)->save('upload/service/' . $name_gen);
        $save_url = 'upload/service/' . $name_gen;

        Services::insert([
            'title' => $request->title,
            'description' => $request->description,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Service Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('all.service')->with($notification);
    }

    public function EditService($id)
    {
        $service = Services::findOrFail($id);
        return view('admin.service.edit_service', compact('service'));
    }

    public function UpdateService(Request $request)
    {
        $Service_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(870, 450)->save('upload/service/' . $name_gen);
            $save_url = 'upload/service/' . $name_gen;

            Services::findOrFail($Service_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Service Updated with Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Services::findOrFail($Service_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Service Updated without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function DeleteService($id)
    {
        $Services = Services::findorFail($id);
        $img = $Services->photo;
        unlink($img);
        Services::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ServiceInactive($id)
    {
        Services::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Service Inactive',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ServiceActive($id)
    {
        Services::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Service Active',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
