<?php 

class logic{
	
	public function getDate(){
		$date = getdate();
		$day  = $this->getDay($date['mday']);
		$month  = $this->getMonth($date['mon']);
		return $date['year'].'-'.$month.'-'.$day;
	}

	private function getMonth($month){
		if($month>=10){
			return $month;
		}else{
			return '0'.$month;
		}
	}

	private function getDay($day){
		if($day>=10){
			return $day;
		}else{
			return '0'.$day;
		}
	}
}