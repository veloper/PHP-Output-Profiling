<?php
include 'class.Bench.php';
$samples  = 40;
$sets     = array(10,20,50,100,500,1000,1500,2000,2500,3000);
$results  = array();
foreach($sets as $iterations) {
    $results[$iterations] = array();
    for($i=0; $i<$samples; $i++) {


		// ECHO
		Bench::start();
		for($j=0;$j<$iterations;$j++) {
			echo 'abcdefghijklmnopqrstuvwxyz0123456789';
		}
		$results[$iterations][] = Bench::stop();
		Bench::reset();


/*
		// Concat
		Bench::start();
		$e = '';
		for($j=0;$j<$iterations;$j++) {
			$e .= 'abcdefghijklmnopqrstuvwxyz0123456789';
		}
		echo $e;
		$results[$iterations][] = Bench::stop();
		Bench::reset();
*/

/*
		// Array
		$a = array();
		Bench::start();
		for($j=0;$j<$iterations;$j++) {
			$a[] = 'abcdefghijklmnopqrstuvwxyz0123456789';
		}
		echo implode('', $a);
		$results[$iterations][] = Bench::stop();
		Bench::reset();
*/

/*
		// Print
		Bench::start();
		for($j=0;$j<$iterations;$j++) {
			print 'abcdefghijklmnopqrstuvwxyz0123456789';
		}
		$results[$iterations][] = Bench::stop();
		Bench::reset();
*/
	}
}

// Average Results
$avg = array();
foreach($results as $set => $array) {
	$avg[$set] = array_sum($array) / count($array);
}

print_r($avg);