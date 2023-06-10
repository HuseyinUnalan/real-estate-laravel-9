<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FaqController extends Controller
{
    public function AllFaq()
    {
        $faqs = Faq::latest()->get();
        return view('admin.faq.all_faq', compact('faqs'));
    }

    public function AddFaq()
    {
        return view('admin.faq.add_faq');
    }

    public function StoreFaq(Request $request)
    {
        Faq::insert([
            'title' => $request->title,
            'description' => $request->description,
            'desk' => $request->desk,
            'location' => $request->location,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Faq Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }

    public function EditFaq($id)
    {
        $faqs = Faq::findOrFail($id);
        return view('admin.faq.edit_faq', compact('faqs'));
    }


    public function UpdateFaq(Request $request)
    {
        $blog_id = $request->id;

        Faq::findOrFail($blog_id)->update([
            
            'title' => $request->title,
            'description' => $request->description,
            'desk' => $request->desk,
            'location' => $request->location,
        
        ]);

        $notification = array(
            'message' => 'Faq Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteFaq($id)
    {
        Faq::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Faq Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function FaqInactive($id)
    {
        Faq::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Faq Inactive Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function FaqActive($id)
    {
        Faq::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Faq Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
