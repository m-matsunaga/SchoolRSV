<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeekDay {

	protected $carbon;
	protected $isHoliday = false;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	function getClassName(){
		$timestamp = time();
		$today = date('Ymd', $timestamp);

		$classNames = [ "day-" . strtolower($this->carbon->format("D")) ];

		//祝日フラグを出す
		if($this->isHoliday){
			$classNames[] = "day-close";
		}

		if ($this->carbon->format('Ymd') < $today){
			$classNames[] = "past";
		}

		return implode(" ", $classNames);
	}

	/**
	 * 日にち表示
	 */
	function render(){
		return '<p class="day">' . $this->carbon->format("j"). '</p>';
	}

	function getDateKey(){
		return $this->carbon->format("Ymd");
	}

	function checkHoliday(HolidayChecking $setting){
		if($setting->isHoliday($this->carbon)){
			$this->isHoliday = true;
		}
	}

}
