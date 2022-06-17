<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\CalendarWeekDay;
use App\Reserve;


class CalendarAuthHomeWeekDay extends CalendarWeekDay {

	/**
	 * @return
	 */

	/**
	 * 日にち表示
	 */
	function render(){

		$rsv_date_ymd = $this->carbon->format("Ymd");
		$rsv_date = \App\Reserve::get()
														->all();

		$ary_date = array_column($rsv_date, 'rsv_date');

		$first_rsv_number = \App\Reserve::where('rsv_date', $this->carbon->format("Ymd"))
																			->whereIn('rsv_frame_id',[1,4])
																			->count();

		$second_rsv_number = \App\Reserve::where('rsv_date', $this->carbon->format("Ymd"))
																			->whereIn('rsv_frame_id',[2,5])
																			->count();

		$third_rsv_number = \App\Reserve::where('rsv_date', $this->carbon->format("Ymd"))
																			->whereIn('rsv_frame_id',[3,6])
																			->count();

		//HTMLの組み立て
		$html = [];

		$html[] = '<p class="day">' . $this->carbon->format("j"). '</p>';


		$html[] ='<div class="rsv_number_layout">';

		if (in_array($this->carbon->format("Ymd"), $ary_date)) {

				if ($first_rsv_number > 0) {

					$html[] ='<div class="">';
					$html[] = '<a href="/auth/reserve/detail/'.$rsv_date_ymd.'/1">一部</a>';
					$html[] = '<p>'.$first_rsv_number.'人</p>';
					$html[] ='</div>';

				 }
				 if ($second_rsv_number > 0) {

					$html[] ='<div class="rsv_number_margin">';
					$html[] = '<a href="/auth/reserve/detail/'.$rsv_date_ymd.'/2">ニ部</a>';
					$html[] = '<p>'.$second_rsv_number.'人</p>';
					$html[] ='</div>';

				}
				if ($third_rsv_number > 0) {

					$html[] ='<div class="rsv_number_margin">';
					$html[] = '<a href="/auth/reserve/detail/'.$rsv_date_ymd.'/3">三部</a>';
					$html[] = '<p>'.$third_rsv_number.'人</p>';
					$html[] ='</div>';

				}
	  }

		$html[] ='</div>';
				return implode("", $html);

	}

}
