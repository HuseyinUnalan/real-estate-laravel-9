<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HouseMessages;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function AllMessage()
    {
        $messages = Message::latest()->get();
        return view('admin.message.all_message', compact('messages'));
    }

    public function DetailMessage(Request $request, $id)
    {

        Message::findOrFail($id)->update(['read_status' => 1]);

        $messages = Message::findOrFail($id);
        return view('admin.message.detail_message', compact('messages'));
    }

    public function DeleteMessage($id)
    {

        Message::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Mesaj Başarıyla Silindi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // House Message
    public function AllHouseMessage()
    {
        $messages = HouseMessages::latest()->get();
        return view('admin.message.all_house_messages', compact('messages'));
    }

    public function DetailHouseMessage(Request $request, $id)
    {

        HouseMessages::findOrFail($id)->update(['read_status' => 1]);

        $messages = HouseMessages::findOrFail($id);
        return view('admin.message.detail_house_message', compact('messages'));
    }

    public function DeleteHouseMessage($id)
    {

        HouseMessages::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Mesaj Başarıyla Silindi.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
