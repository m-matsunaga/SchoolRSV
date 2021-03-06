<?php
namespace App\Calendar;

use Carbon\Carbon;
use App\Calendar\HolidayChecking;

class CalendarView {

	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	/**
	 * タイトル
	 */
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}

	/**
	 * カレンダーを出力する
	 */
	function render(){
		$setting = new HolidayChecking();
		$setting->loadHoliday($this->carbon->format("Y"));
		$html = [];
		$html[] = '<div class="calendar">';
		$html[] = '<table class="table">';
		$html[] = '<thead>';
		$html[] = '<tr>';
		$html[] = '<th>月</th>';
		$html[] = '<th>火</th>';
		$html[] = '<th>水</th>';
		$html[] = '<th>木</th>';
		$html[] = '<th>金</th>';
		$html[] = '<th class="sat">土</th>';
        $html[] = '<th class="sun">日</th>';
		$html[] = '</tr>';
		$html[] = '</thead>';

 		$html[] = '<tbody>';

 		$weeks = $this->getWeeks();

 		foreach($weeks as $week){
			$html[] = '<tr class="'.$week->getClassName().'">';
			$days = $week->getDays($setting);
		foreach($days as $day){
			$html[] = $this->renderDay($day);
		}
			$html[] = '</tr>';
		}

		$html[] = '</tbody>';
		$html[] = '</table>';
		$html[] = '</div>';
		return implode("", $html);
	}


	protected function getWeeks(){
		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();

		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();

		//1週目
		$weeks[] = $this->getWeek($firstDay->copy());
		// $weeks[] = $week;

		//作業用（週の初めを取得）  //startOfWeek 週の開始日に移動
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$weeks[] = $this->getWeek($tmpDay->copy(), count($weeks));
			// $weeks[] = $week;

      //次の週=+7日する（翌週初めへ移動）
			$tmpDay->addDay(7);
		}

		return $weeks;
	}

	public function getNextMonth(){
		return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
	}

	public function getPreviousMonth(){
		return $this->carbon->copy()->subMonthsNoOverflow()->format('Y-m');
	}

	protected function renderDay(CalendarWeekDay $day){
		$html = [];
		$html[] = '<td class="'.$day->getClassName().'">';
		$html[] = $day->render();
		$html[] = '</td>';
		return implode("", $html);
	}

 	protected function getWeek(Carbon $date, $index = 0){
		return new CalendarWeek($date, $index);
	}
}
