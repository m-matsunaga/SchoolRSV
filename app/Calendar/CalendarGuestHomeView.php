<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Calendar\CalendarGuestHomeWeek;

class CalendarGuestHomeView extends CalendarView{

	protected function getWeek(Carbon $date, $index = 0){
		$week = new CalendarGuestHomeWeek($date, $index);
		return $week;
	}

}
