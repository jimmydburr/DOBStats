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
		$result = new StatsOutput($testCopyTalleyAge);
		var_dump($result);
		$this->assertEquals(
			$testCopyTalleyAge->getDriverCounts("Total"),
			$result->getDriverCounts("Total")
		);
	}
}
