<?php
namespace App\Calendar;
use Carbon\Carbon;
use Yasumi\Yasumi;

class HolidayChecking
{
	private $holidays = null;

	function loadHoliday($year){
		$this->holidays = Yasumi::create("Japan", $year,"ja_JP");
	}

	function isHoliday($date){
		if(!$this->holidays)return false;
		return $this->holidays->isHoliday($date);
	}

}
