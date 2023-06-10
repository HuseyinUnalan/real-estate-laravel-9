<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class ClientController extends Controller
{
    public function AllClient()
    {
        $clients = Client::latest()->get();
        return view('admin.client.all_client', compact('clients'));
    }

    public function AddClient()
    {
        return view('admin.client.add_client');
    }

    public function StoreClient(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(870, 450)->save('upload/client/' . $name_gen);
        $save_url = 'upload/client/' . $name_gen;

        Client::insert([
            'name' => $request->name,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Client Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.client')->with($notification);
    }

    public function EditClient($id)
    {
        $clients = Client::findOrFail($id);
        return view('admin.client.edit_client', compact('clients'));
    }


    public function UpdateClient(Request $request)
    {
        $client_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(870, 450)->save('upload/client/' . $name_gen);
            $save_url = 'upload/client/' . $name_gen;

            Client::findOrFail($client_id)->update([
                'name' => $request->name,
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Client Updated with Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Client::findOrFail($client_id)->update([
                'name' => $request->name,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Client Updated without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }


    public function DeleteClient($id)
    {
        $clients = Client::findorFail($id);
        $img = $clients->photo;
        unlink($img);

        Client::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Client Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ClientInactive($id)
    {
        Client::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Client Inactive',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ClientActive($id)
    {
        Client::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Client Active',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
