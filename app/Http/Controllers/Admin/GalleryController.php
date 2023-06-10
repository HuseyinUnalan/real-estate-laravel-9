<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class GalleryController extends Controller
{


    public function AllGallery()
    {
        $gallerys = Gallery::latest()->get();
        return view('admin.gallery.all_gallery', compact('gallerys'));
    }

    public function AddGallery()
    {
        return view('admin.gallery.add_gallery');
    }


    public function StoreGallery(Request $request)
    {
        $image = $request->file('file');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(640, 960)->save('upload/gallery/' . $imageName);
        $save_url = 'upload/gallery/' . $imageName;

        Gallery::insert([
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);
    }


    public function EditGallery($id)
    {
        $gallerys = Gallery::findOrFail($id);
        return view('admin.gallery.edit_gallery', compact('gallerys'));
    }


    public function UpdateGallery(Request $request)
    {
        $gallery_id = $request->id;

        Gallery::findOrFail($gallery_id)->update([

            'desk' => $request->desk,

        ]);

        $notification = array(
            'message' => 'Gallery Image Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('all.gallery')->with($notification);
    }

    public function DeleteGallery($id)
    {
        $gallerys = Gallery::findorFail($id);
        $img = $gallerys->photo;
        unlink($img);

        Gallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Gallery Image Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GalleryInactive($id)
    {
        Gallery::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Gallery Image Inactive',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function GalleryActive($id)
    {
        Gallery::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Gallery Image Active',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
