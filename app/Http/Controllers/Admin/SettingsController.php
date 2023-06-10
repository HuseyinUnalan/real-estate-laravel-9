<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function SettingsEdit()
    {
        $settings = Setting::find(1);
        return view('admin.settings.edit_settings', compact('settings'));
    }

    public function SettingsStore(Request $request)
    {

        $settings = Setting::find(1);
        $settings->title = $request->title;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $settings->phone = $request->phone;
        $settings->mail = $request->mail;
        $settings->address = $request->address;


        if ($request->file('logo')) {
            $file = $request->file('logo');
            @unlink(public_path($settings->logo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $settings['logo'] = 'upload/logos/' . $filename;
        }

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            @unlink(public_path($settings->favicon));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/logos'), $filename);
            $settings['favicon'] = 'upload/logos/' .  $filename;
        }

        $settings->save();

        $notification = array(
            'message' => 'Site Settings Updated',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
