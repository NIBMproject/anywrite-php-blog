<?php 

class Util{

	public function getTimeDiff($dateTime){
		$d = "";
		$now = strtotime(date('Y-m-d H:i:s'));
		$sec = round(abs(strtotime($dateTime) - $now));

		if($sec < 60){
			$d = $sec."s";
		}elseif (round($sec/60) < 60) {
			$d = round($sec/60)."min";
		}elseif (round($sec/60/60) < 24) {
			$d = round($sec/60/60)."h";
		}elseif (round($sec/60/60/24) < 7) {
			$d = round($sec/60/60/24)."d";
		}else{
			$d = date("F j,Y",strtotime($dateTime));
		}
		return $d;
	}
}


// $u = new Util();
// $u->getTimeDiff("2020-08-13 21:05:25");
?>