<?php
function spelling($number){
	$number = abs($number);
	$read = array("", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "eleven");
	$spell = "";
	if ($number< 12) {
		$spell = " " . $read[$number];
	}
	else if ($number < 20){
		$spell = spelling($number - 10) . " belas";
	}
	else if ($number < 100){
		$spell = spelling($number/10)." puluh" . spelling($number % 10);
	}
	else if ($number < 200){
		$spell = " hundred" . spelling($number - 100);
	}
	else if ($number < 1000){
		$spell = spelling($number/100) . " hundred" . spelling($number % 100);
	}
	else if ($number < 2000){
		$spell = " thousand" . spelling($number - 1000);
	}
	else if ($number < 1000000){
		$spell = spelling($number/1000) . " thousand" . spelling($number % 1000);
	}
	else if ($number < 1000000000){
		$spell = spelling($number/1000000) . " million" . spelling($number % 1000000);
	}

	return $spell;
}