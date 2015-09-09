<?php

use JimmyDBurrell\DOBStats\DateDiff;

class DateDiffTest extends PHPUnit_Framework_TestCase
{
	public function testDateTimeDiff365Days()
	{
		$date1 = '2014-09-08';
		$dateDiff = new DateDiff($date1);
		$this->assertEquals(365, $dateDiff->diffInDays());
	}

	public function testDateTimeDiff55Years()
	{
		$date1 = '1959-10-15';
		$dateDiff = new DateDiff($date1);
		$this->assertEquals(55, $dateDiff->diffInYears());
	}
}
?>
