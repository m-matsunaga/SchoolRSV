<?php

namespace App\Http\Controllers\login\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar\CalendarAuthHomeView;
use App\Reserve;

class homeController extends Controller
{

   public function AuthHome(Request $request){

        $date = $request->input("date");

        if(!$date)$date = time();

				$calendar = new CalendarAuthHomeView($date);
				return view('login.auth.auth_home')->with([
					"calendar" => $calendar,
    		  "date" => $date,
		]);
	}
}
