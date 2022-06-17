<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeek;


class CalendarGuestHomeWeek extends CalendarWeek {
	/**
	 * @return CalendarWeekDayForm
	 */
	function getDay(Carbon $date, HolidayChecking $setting){
		$day = new CalendarGuestHomeWeekDay($date);
		$day->checkHoliday($setting);
		return $day;
	}
}
