<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Calendar\CalendarAuthHomeWeek;

class CalendarAuthHomeView extends CalendarView{

	protected function getWeek(Carbon $date, $index = 0){
		$week = new CalendarAuthHomeWeek($date, $index);
		return $week;
	}

}
