<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

// PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class CalendarController extends Controller
{
    public function Calendar()
    {
        $calendars = Calendar::latest()->get();
        return view('admin.calendar.calendar', compact('calendars'));
    }

    public function AllCalendar()
    {
        $calendars = Calendar::latest()->get();
        return view('admin.calendar.all_calendar', compact('calendars'));
    }

    public function StoreCalendar(Request $request)
    {
        Calendar::insert([
            'eventname' => $request->eventname,
            'date' => $request->date,
            'time' => $request->time,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Calendar Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('calendar')->with($notification);
    }

    public function EditCalendar($id)
    {
        $calendars = Calendar::findOrFail($id);
        return view('admin.calendar.edit_calendar', compact('calendars'));
    }


    public function UpdateCalendar(Request $request)
    {
        $calendar_id = $request->id;

        Calendar::findOrFail($calendar_id)->update([

            'eventname' => $request->eventname,
            'date' => $request->date,
            'time' => $request->time,
            
        ]);

        $notification = array(
            'message' => 'Calendar Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.calendar')->with($notification);
    }

    public function DeleteCalendar($id)
    {
        Calendar::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Calendar Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }




    // public function CalendarMail()
    // {
    //     // $date = Carbon::now();

    //     $mail = new PHPMailer(true);
    //     $mail->CharSet = "UTF-8";
    //     try {
    //         $mail->isSMTP(); // using SMTP protocol                                     
    //         $mail->Host = 'smtp.mailtrap.io'; // SMTP host as gmail 
    //         $mail->SMTPAuth = true;  // enable smtp authentication                             
    //         $mail->Username = 'e07ac8c30e4a5c';  // sender gmail host              
    //         $mail->Password = '810c70875b175b'; // sender gmail host password                          
    //         $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    //         $mail->Port = 2525;   // port for SMTP     


    //         $mail->setFrom('huseyinunalan@yandex.com', 'Huseyin'); // sender's email and name
    //         $mail->addAddress('huseyin66unalan@gmail.com', 'Merhaba Huseyin');  // receiver's email and name

    //         $mail->Subject = 'Bugünkü Yapılacaklar';
    //         $mail->Body    = 'asdasd';

    //         $mail->IsHTML(true);
    //         $mail->send();
    //         return redirect()->route('calendar');
    //     } catch (Exception $e) { // handle error.
    //         echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    //     }
    // }
}
