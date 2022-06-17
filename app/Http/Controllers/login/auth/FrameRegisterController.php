<?php

namespace App\Http\Controllers\login\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarFrameRegisterView;

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

        foreach($rsv_frame_counts as $date_key => $value){

            $registered_frame_first = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '1')
                                      ->first();
            $registered_frame_second = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '2')
                                      ->first();
            $registered_frame_third = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '3')
                                      ->first();
            $registered_frame_fourth = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '4')
                                      ->first();
            $registered_frame_fifth = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '5')
                                      ->first();
            $registered_frame_sixth = \App\RsvFrameCount::where('date', $date_key)
                                      ->where('rsv_frame_id', '6')
                                      ->first();

            if ($registered_frame_first) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 1)
                                        ->update([
                                            'frame_count' => $value["first"],
                                        ]);
            } elseif (!$registered_frame_first) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 1,
                        'frame_count' => $value["first"],
                    ]);
            }

            if ($registered_frame_second) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 2)
                                        ->update([
                                            'frame_count' => $value["second"],
                                        ]);
            } elseif (!$registered_frame_second) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 2,
                        'frame_count' => $value["second"],
                    ]);
            }

            if ($registered_frame_third) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 3)
                                        ->update([
                                            'frame_count' => $value["third"],
                                        ]);
            } elseif (!$registered_frame_third) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 3,
                        'frame_count' => $value["third"],
                    ]);
            }

            if ($registered_frame_fourth) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 4)
                                        ->update([
                                            'frame_count' => $value["fourth"],
                                        ]);
            } elseif (!$registered_frame_fourth) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 4,
                        'frame_count' => $value["fourth"],
                    ]);
            }

            if ($registered_frame_fifth) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 5)
                                        ->update([
                                            'frame_count' => $value["fifth"],
                                        ]);
            } elseif (!$registered_frame_fifth) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 5,
                        'frame_count' => $value["fifth"],
                    ]);
            }

            if ($registered_frame_sixth) {
                    \App\RsvFrameCount::where('date', $date_key)
                                        ->where('rsv_frame_id', 6)
                                        ->update([
                                            'frame_count' => $value["sixth"],
                                        ]);
            } elseif (!$registered_frame_sixth) {
                    \App\RsvFrameCount::insert([
                        'date' => $date_key,
                        'rsv_frame_id' => 6,
                        'frame_count' => $value["sixth"],
                    ]);
            }
        }

        return back();

    }
}
