<?php
class Exercice {

	private $start_date;
	private $end_date;
	private $total;
	private $baseline;
	private $intervalDate;
	private $minValueInOneDay = 0;
	private $numberOfDaysToFill = 0;
	private $totalDistributed = 0;
	private $minTotalDistributed = 0;
	private $maxTotalDistributed = 0;

	public function __construct($start_date, $end_date, $total, $baseline){
		
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->total = $total;
		$this->baseline = $baseline;

		$onePerCentOfTotal = $total/100;

		$this->minTotalDistributed = $total - $onePerCentOfTotal;
		$this->maxTotalDistributed = $total + $onePerCentOfTotal;

		$this->setIntervalDate($start_date, $end_date);
		$this->setMinDate();

	}

	private function isWeekend($date) {
		$weekDay = date('w', strtotime($date));
		return ($weekDay == 0 || $weekDay == 6);
	}

	private function setIntervalDate($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

		$dates = array();
		$current = strtotime($first);
		$last = strtotime($last);

		while( $current <= $last ) {

			if  ($this->isWeekend(date($output_format, $current))){
				$dates[date($output_format, $current)]  = 0;
			}else{
				$dates[date($output_format, $current)]  =  "filled-me";
				$this->numberOfDaysToFill++;
				$this->last_date_to_fill = date($output_format, $current);
			}
			$current = strtotime($step, $current);
		}

		$this->intervalDate =  $dates;
	}

	private function setMinDate() {

		$this->minValueInOneDay =  (($this->baseline * $this->total) / 100) / $this->numberOfDaysToFill;
		foreach ($this->intervalDate as $date => $value) {
			if($value === "filled-me"){
				$this->intervalDate[$date] = $this->minValueInOneDay;
				$this->intervalDate[$date] = round($this->intervalDate[$date], 2); 
				$this->totalDistributed += $this->intervalDate[$date];
			}
		}
	}

	public function distributeTotalAmount(){
		$maxValue = $this->maxTotalDistributed - $this->totalDistributed;
		$totalDistributed = $this->totalDistributed;

		foreach ($this->intervalDate as $date => $value) {
			
			if($value != 0){
				$rand = rand ( 100 , $maxValue *100) / 100;
				
				if ($date == $this->last_date_to_fill) {
					if( ($totalDistributed + $rand > $this->maxTotalDistributed) ){
						$this->intervalDate[$date] += $maxValue;
						$this->intervalDate[$date] = round($this->intervalDate[$date], 2); 
						return $this->intervalDate;
					}
					if( ($totalDistributed < $this->minTotalDistributed) ){
						$this->intervalDate[$date] += $maxValue;
						$this->intervalDate[$date] = round($this->intervalDate[$date], 2); 
						return $this->intervalDate;
					}
				}

				if( ($totalDistributed + $rand <= $this->maxTotalDistributed)){
					$this->intervalDate[$date] += $rand;
					$this->intervalDate[$date] = round($this->intervalDate[$date], 2); 
					$maxValue-= $rand;
					$totalDistributed+=$rand;
				}

			}

		}
		
		return $this->intervalDate;

	}
}						