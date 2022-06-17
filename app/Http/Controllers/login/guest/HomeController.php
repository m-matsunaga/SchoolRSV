<?php

namespace App\Http\Controllers\login\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarGuestHomeView;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function GuestHome(Request $request){

        // protected $carbon;
		// $timestamp = time();
		// $today = date('Ymd', $timestamp);
		// $id = Auth::id();
		// $user_rsv = \App\Reserve::where('rsv_date', 20220602)
		// 													->where('user_id', $id)
		// 													->get();
        $date = $request->input("date");

        if(!$date)$date = time();

		$calendar = new CalendarGuestHomeView($date);
		return view('login.guest.guest_home')->with([
			"calendar" => $calendar,
            "date" => $date,
            // "user_rsv" => $user_rsv,
		]);
	}
}
