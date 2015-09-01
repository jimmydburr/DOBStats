<?php

use JimmyDBurrell\DOBStats\DateDiff;

class DateDiffTest extends PHPUnit_Framework_TestCase
{

	public function testDateTimeDiff365Days()
	{
		$date1 = '2014-08-31';
		$date2 = date("Y-m-d H:i:s");	// date now
		echo $date2;
		$dateCalc = new DateDiff($date1, $date2);
		$this->assertEquals(365, $dateCalc->diff());
	}

}

?>
