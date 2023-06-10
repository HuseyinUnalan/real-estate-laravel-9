<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class TeamController extends Controller
{
    public function AllTeam()
    {
        $teams = Team::latest()->get();
        return view('admin.team.all_team', compact('teams'));
    }

    public function AddTeam()
    {
        return view('admin.team.add_team');
    }

    public function StoreTeam(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(370, 475)->save('upload/team/' . $name_gen);
        $save_url = 'upload/team/' . $name_gen;

        Team::insert([
            'name' => $request->name,
            'position' => $request->position,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Team Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function EditTeam($id)
    {
        $teams = Team::findOrFail($id);
        return view('admin.team.edit_team', compact('teams'));
    }


    public function UpdateTeam(Request $request)
    {
        $team_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(370, 475)->save('upload/team/' . $name_gen);
            $save_url = 'upload/team/' . $name_gen;

            Team::findOrFail($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Team Updated with Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Team::findOrFail($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Team Updated without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function DeleteTeam($id)
    {
        $teams = Team::findorFail($id);
        $img = $teams->photo;
        unlink($img);

        Team::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Team Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    
    public function TeamInactive($id)
    {
        Team::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Team Inactive',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function TeamActive($id)
    {
        Team::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Team Active',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
