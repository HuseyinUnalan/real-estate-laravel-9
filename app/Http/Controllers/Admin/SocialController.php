<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    public function AllSocial()
    {
        $socials = Social::latest()->get();
        return view('admin.social.all_social', compact('socials'));
    }

    public function AddSocial()
    {
        return view('admin.social.add_social');
    }


    public function StoreSocial(Request $request)
    {

        Social::insert([

            'icon' => $request->icon,
            'link' => $request->link,
            'desk' => $request->desk,


        ]);

        $notification = array(
            'message' => 'Social Media Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.social')->with($notification);
    }

    public function EditSocial($id)
    {
        $socials = Social::findOrFail($id);
        return view('admin.social.edit_social', compact('socials'));
    }

    public function UpdateSocial(Request $request)
    {

        $social_id = $request->id;

        Social::findOrFail($social_id)->update([
            
            'icon' => $request->icon,
            'link' => $request->link,
            'desk' => $request->desk,

        ]);

        $notification = array(
            'message' => 'Social Media without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteSocial($id)
    {

        Social::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Social Media Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SocialInactive($id)
    {
        Social::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Social Media Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function SocialActive($id)
    {
        Social::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Social Media Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function AllIcon()
    {
        return view('admin.social.all_icons');
    }


}
