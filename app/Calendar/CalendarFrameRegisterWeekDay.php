<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeekDay;
use App\Reserve;
use App\RsvFrameCount;
use Illuminate\Support\Facades\Auth;


class CalendarFrameRegisterWeekDay extends CalendarWeekDay {

	/**
	 * @return
	 */

	// function getClassName(){
	// 	$timestamp = time();
	// 	$today = date('Ymd', $timestamp);
	// 	if ($this->carbon->format('Ymd') < $today) {
	// 		return "day-" . strtolower($this->carbon->format("D")) . " past";
	// 	} else {
	// 		return "day-" . strtolower($this->carbon->format("D"));
	// 	}
	// }

	/**
	 * 日にち表示
	 */
	function render(){

		//必要データ取得

		$first_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '1')
																				->first();

		$second_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '2')
																				->first();

		$third_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '3')
																				->first();

		$fourth_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '4')
																				->first();

		$fifth_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '5')
																				->first();

		$sixth_frame_count =  \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																				->where('rsv_frame_id', '6')
																				->first();

		//HTMLの組み立て
		$html = [];

		$html[] = '<p class="day">' . $this->carbon->format("j"). '</p>';

		//リモート
		$html[] = '<div class="remote-frame">';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">1部</label>';
				if ($first_frame_count) {
					$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][first]" value="' . $first_frame_count->frame_count . '">';
				} else {
					$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][first]" value="0">';
				}
			$html[] = '</div>';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">2部</label>';
				if ($second_frame_count) {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][second]" value="' . $second_frame_count->frame_count . '">';
				} else {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][second]" value="0">';
				}
			$html[] = '</div>';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">3部</label>';
				if ($third_frame_count) {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][third]" value="' . $third_frame_count->frame_count . '">';
				} else {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][third]" value="0">';
				}
			$html[] = '</div>';
		$html[] = '</div>';


		//本社
		$html[] = '<div class="office-frame none">';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">1部</label>';
				if ($fourth_frame_count) {
					$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][fourth]" value="' . $fourth_frame_count->frame_count . '">';
				} else {
					$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][fourth]" value="0">';
				}
			$html[] = '</div>';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">2部</label>';
				if ($fifth_frame_count) {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][fifth]" value="' . $fifth_frame_count->frame_count . '">';
				} else {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][fifth]" value="0">';
				}
			$html[] = '</div>';
			$html[] = '<div class="frame-box">';
				$html[] = '<label for="">3部</label>';
				if ($sixth_frame_count) {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][sixth]" value="' . $sixth_frame_count->frame_count . '">';
				} else {
				$html[] = '<input type="text" name="rsv_frame_count[' . $this->carbon->format("Ymd") . '][sixth]" value="0">';
				}
			$html[] = '</div>';
		$html[] = '</div>';

	return implode("", $html);
}
}
