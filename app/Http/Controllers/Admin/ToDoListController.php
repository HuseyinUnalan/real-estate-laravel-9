<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ToDoListController extends Controller
{
    public function ToDoList()
    {
        $todolists = ToDoList::orderBy('status', 'ASC')->get();
        return view('admin.todolist.to_do_list', compact('todolists'));
    }

    public function StoreToDo(Request $request)
    {
        ToDoList::insert([
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'To Do Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('todo')->with($notification);
    }

    public function EditToDo($id)
    {
        $todolists = ToDoList::findOrFail($id);
        return view('admin.todolist.edit_to_do_list', compact('todolists'));
    }


    public function UpdateToDo(Request $request)
    {
        $todo_id = $request->id;

        ToDoList::findOrFail($todo_id)->update([
            
            'title' => $request->title,
        
        ]);

        $notification = array(
            'message' => 'To Do Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('todo')->with($notification);
    }

    public function DeleteToDo($id)
    {
        ToDoList::findOrFail($id)->delete();

        $notification = array(
            'message' => 'To Do Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ToDoInactive($id)
    {
        ToDoList::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'To Do Check Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function ToDoActive($id)
    {
        ToDoList::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'To Do Check Back Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
