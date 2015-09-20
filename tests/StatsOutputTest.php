<?php

use JimmyDBurrell\DOBStats\TalleyAge;
use JimmyDBurrell\DOBStats\StatsOutput;

class StatsOutputTest extends PHPUnit_Framework_TestCase
{
	public function testStatsOutputConstruct()
	{
        $age = 48;
		$testCopyTalleyAge = new TalleyAge();
		$testCopyTalleyAge->countAndCategorize($age);
		$this->assertEquals(1, $testCopyTalleyAge->getDriverCounts("ageData"));
	}
}
