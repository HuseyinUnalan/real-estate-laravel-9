<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HousePhoto;
use App\Models\Houses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class HouseController extends Controller
{

    public function AllHouse()
    {
        $houses = Houses::latest()->get();
        return view('admin.houses.all_house', compact('houses'));
    }
    public function AddHouse()
    {
        return view('admin.houses.add_house');
    }

    public function StoreHouse(Request $request)
    {

        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ', '?');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-', '');

        Houses::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => strtolower(str_replace($search,$replace, $request->title)),
            'year' => $request->year,
            'squaremeters' => $request->squaremeters,
            'price' => $request->price,
            'status' => $request->status,
            'numberofrooms' => $request->numberofrooms,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'address' => $request->address,
            'map' => $request->map,
            'garage' => $request->garage,
            'type' => $request->type,
            'features' => $request->features,
            'floor' => $request->floor,
            'video' => $request->video,
            'desk' => $request->desk,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Ev Başarıyla Eklendi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function EditHouse($id)
    {
        $house = Houses::findOrFail($id);
        return view('admin.houses.edit_house', compact('house'));
    }

    public function UpdateHouse(Request $request)
    {
        $house_id = $request->id;

        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ', '?');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-', '');

        Houses::findOrFail($house_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => strtolower(str_replace($search,$replace, $request->title)),
            'year' => $request->year,
            'squaremeters' => $request->squaremeters,
            'price' => $request->price,
            'status' => $request->status,
            'numberofrooms' => $request->numberofrooms,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'address' => $request->address,
            'map' => $request->map,
            'garage' => $request->garage,
            'type' => $request->type,
            'features' => $request->features,
            'floor' => $request->floor,
            'video' => $request->video,
            'desk' => $request->desk,
        ]);

        $notification = array(
            'message' => 'Ev Başarıyla Güncellendi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteHouse($id)
    {
        Houses::findOrFail($id)->delete();

        $images = HousePhoto::where('house_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo);
            HousePhoto::where('house_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Ev Silindi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function HouseInactive($id)
    {
        Houses::findOrFail($id)->update(['activity_status' => 0]);
        $notification = array(
            'message' => 'Ev Yayından Kaldırıldı.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function HouseActive($id)
    {
        Houses::findOrFail($id)->update(['activity_status' => 1]);
        $notification = array(
            'message' => 'Ev Yayına Alındı.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AddHousePhoto($id)
    {

        $houses = Houses::findOrFail($id);
        $housephotos = HousePhoto::where('house_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.houses.add_photo', compact('houses', 'housephotos'));
    }

    public function StoreHousePhoto(Request $request)
    {
        $image = $request->file('file');
        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->save('upload/house/' . $imageName);
        $save_url = 'upload/house/' . $imageName;

        HousePhoto::insert([
            'photo' => $save_url,
            'house_id' => $request->house_id,
            'created_at' => Carbon::now(),
        ]);
    }

    public function DeleteHousePhoto($id)
    {
        $housephoto = HousePhoto::findorFail($id);
        $img = $housephoto->photo;
        unlink($img);

        HousePhoto::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Ev Fotoğrafı Silindi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
