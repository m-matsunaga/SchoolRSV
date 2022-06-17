<?php
namespace App\Calendar;
use Carbon\Carbon;
use App\Calendar\CalendarView;
use App\Calendar\CalendarFrameRegisterWeek;

class CalendarFrameRegisterView extends CalendarView{

	protected function getWeek(Carbon $date, $index = 0){
		$week = new CalendarFrameRegisterWeek($date, $index);
		return $week;
	}

}
