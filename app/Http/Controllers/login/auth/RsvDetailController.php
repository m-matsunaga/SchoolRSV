<?php

namespace App\Http\Controllers\login\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RsvDetailController extends Controller
{
    public function RsvDetailView($date, $frame){

        $rsv_date = date_create_from_format("Ymd", $date)->format("Y年m月d日");
        $rsv_frame = $frame;

		$rsv_details = \App\Reserve::with(['user'])
                                    ->where('rsv_date', $date)
                                    ->whereIn('rsv_frame_id',[$frame, $frame+3])
									->get();

		return view('login.auth.auth_rsv_detail')->with([
            "rsv_date" => $rsv_date,
            "rsv_frame" => $rsv_frame,
            "rsv_details" => $rsv_details,
		]);
    	}

    public function RsvAttendanceChange(Request $request){

        $selectVal = $request->selectVal;
        $rsv_id = $request->rsv_id;

        \App\Reserve::where('id', $rsv_id)
                    ->update(['attendance' => $selectVal]);

		return back();
    }
}
