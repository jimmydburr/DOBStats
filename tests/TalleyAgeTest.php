<?php

use JimmyDBurrell\DOBStats\TalleyAge;

class TalleyAgeTest extends PHPUnit_Framework_TestCase
{

    public function testTalleyAgeCategorizeReturnsTrue()
    {
        $age = 48;
		$ageTalley = new TalleyAge();
		$this->assertEquals(true, $ageTalley->countAndCategorize($age));
    }

    public function testTalleyAgeCountAndCategorizeEqualsOneForTotalCount()
    {
        $age = 70;
		$ageTalley = new TalleyAge();
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(1, $ageTalley->getDriverCounts("Total"));
    }

    public function testTalleyAgeGetDriverCountsUnder25()
    {
        $age = 18;
		$ageTalley = new TalleyAge();
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(1, $ageTalley->getDriverCounts("Under25"));
    }

    public function testTalleyAgeGetDriverCounts25to34()
    {
        $age = 30;
		$ageTalley = new TalleyAge();
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(1, $ageTalley->getDriverCounts("25to34"));
    }

    public function testTalleyAgeGetAverageAge()
    {
		$ageTalley = new TalleyAge();
        $age = 30;
		$ageTalley->countAndCategorize($age);
        $age = 50;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(40, $ageTalley->getAverageAge("Total"));
    }

}
?>
