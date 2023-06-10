<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class TestimonialController extends Controller
{
    public function AllTestimonial()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonial.all_testimonial', compact('testimonials'));
    }

    public function AddTestimonial()
    {
        return view('admin.testimonial.add_testimonial');
    }


    public function StoreTestimonial(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(370, 475)->save('upload/testimonial/' . $name_gen);
        $save_url = 'upload/testimonial/' . $name_gen;

        Testimonial::insert([
            'name' => $request->name,
            'description' => $request->description,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Testimonial Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notification);
    }

    public function EditTestimonial($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit_testimonial', compact('testimonials'));
    }


    public function UpdateTestimonial(Request $request)
    {
        $team_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(370, 475)->save('upload/testimonial/' . $name_gen);
            $save_url = 'upload/testimonial/' . $name_gen;

            Testimonial::findOrFail($team_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Testimonial Updated with Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            Testimonial::findOrFail($team_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Testimonial Updated without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function DeleteTestimonial($id)
    {
        $teams = Testimonial::findorFail($id);
        $img = $teams->photo;
        unlink($img);

        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    
    public function TestimonialInactive($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Testimonial Inactive',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function TestimonialActive($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Testimonial Active',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
