<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeek;
use App\Calendar\HolidayChecking;


class CalendarFrameRegisterWeek extends CalendarWeek {
	/**
	 * @return CalendarWeekDayForm
	 */
	function getDay(Carbon $date, HolidayChecking $setting){
		$day = new CalendarFrameRegisterWeekDay($date);
		$day->checkHoliday($setting);

		return $day;
	}
}
