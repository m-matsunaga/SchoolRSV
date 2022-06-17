<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeekDay;
use App\Reserve;
use App\RsvFrameCount;
use Illuminate\Support\Facades\Auth;


class CalendarGuestHomeWeekDay extends CalendarWeekDay {

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

		$timestamp = time();
		$today = date('Ymd', $timestamp);
		$id = Auth::id();
		$user_rsv_gets = \App\Reserve::where('rsv_date', $this->carbon->format("Ymd"))
															->where('user_id', $id)
															->get();
		$user_rsvs = \App\Reserve::where('user_id', $id)
															->get()
															->all();
		$ary_date = array_column($user_rsvs, 'rsv_date');

		$rsv_frame_remainders = \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																					->where('frame_count', '>' ,'0')
																					->get();

		$rsv_frame_count = \App\RsvFrameCount::where('date', $this->carbon->format("Ymd"))
																					->where('frame_count', '>' ,'0')
																					->first();

		//HTMLの組み立て
		$html = [];

		$html[] = '<p class="day">' . $this->carbon->format("j"). '</p>';

		//過去
		if ($this->carbon->format('Ymd') < $today) {
			if (in_array($this->carbon->format("Ymd"), $ary_date)){
				foreach ($user_rsv_gets as $user_rsv_get) {
					$html[] = '<p class="font-size">' . $user_rsv_get->rsvFrame->rsv_frame . $user_rsv_get->attendance .'</p>';
				}
			}	else {
					$html[] = '<p>×</p>';
			}

		//今日以降
		} else {
			if (in_array($this->carbon->format("Ymd"), $ary_date)){
				foreach ($user_rsv_gets as $user_rsv_get) {
					if ($user_rsv_get->attendance) {
						$html[] = '<p class="font-size">' . $user_rsv_get->rsvFrame->rsv_frame . $user_rsv_get->attendance .'</p>';
					}	else {
						$html[] = '<p class="font-size">' . $user_rsv_get->rsvFrame->rsv_frame .'</p>';
						$html[] = '<a href="/guest/rsv/cancel/'. $user_rsv_get->id .'" class="cancel-button">キャンセル</a>';
					}
				}
			}	else {
				if($rsv_frame_count){
									$html[] = '<select name="rsv_frame[' . $this->carbon->format("Ymd") . ']" class="select-box-flame">';
									$html[] = '<option value="">予約する</option>';
					foreach ($rsv_frame_remainders as $rsv_frame_remainder) {
									$html[] = '<option value='. $rsv_frame_remainder->rsvFrame->id .' class="font-size">' .$rsv_frame_remainder->rsvFrame->rsv_frame . '</option>';
								}
									$html[] = '</select>';
					} else {
					$html[] = '<p>×</p>';
			}
	 }
	}
	return implode("", $html);
}
}
