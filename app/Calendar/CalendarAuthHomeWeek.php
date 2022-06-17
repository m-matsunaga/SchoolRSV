<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeek;


class CalendarAuthHomeWeek extends CalendarWeek {
	/**
	 * @return CalendarWeekDayForm
	 */
	function getDay(Carbon $date, HolidayChecking $setting){
		$day = new CalendarAuthHomeWeekDay($date);
		$day->checkHoliday($setting);
		return $day;
	}
}
