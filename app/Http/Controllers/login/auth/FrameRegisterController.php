<?php

namespace App\Http\Controllers\login\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarFrameRegisterView;
use App\FrameRegister\FrameRegister;

class FrameRegisterController extends Controller
{
   public function FrameRegisterView(Request $request){

    $date = $request->input("date");
    if(!$date)$date = time();
	$calendar = new CalendarFrameRegisterView($date);
	return view('login.auth.frame_register')->with([
		"calendar" => $calendar,
        "date" => $date,
	]);

   }

//枠数登録
   public function FrameRegister(Request $request){

        $rsv_frame_counts = $request->rsv_frame_count;

        $FrameRegister =  new FrameRegister();
        $FrameRegister->FrameRegister($rsv_frame_counts);

        return back();

    }
}
