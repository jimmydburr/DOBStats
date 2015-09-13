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
		$ageTalley = new TalleyAge();
        $age = 18;
		$ageTalley->countAndCategorize($age);
        $age = 18;
		$ageTalley->countAndCategorize($age);
        $age = 18;
		$ageTalley->countAndCategorize($age);
        $age = 18;
		$ageTalley->countAndCategorize($age);
        $age = 18;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(5, $ageTalley->getDriverCounts("Under25"));
    }

    public function testTalleyAgeGetDriverCounts25to34()
    {
		$ageTalley = new TalleyAge();
        $age = 30;
		$ageTalley->countAndCategorize($age);
        $age = 33;
		$ageTalley->countAndCategorize($age);
        $age = 32;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(3, $ageTalley->getDriverCounts("25to34"));
    }

    public function testTalleyAgeGetAverageAgeTotal()
    {
		$ageTalley = new TalleyAge();
        $age = 30;
		$ageTalley->countAndCategorize($age);
        $age = 40;
		$ageTalley->countAndCategorize($age);
        $age = 50;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(40, $ageTalley->getAverageAge("Total"));
    }

	public function testTalleyAgeGetAverageAge45to54()
	{
		$ageTalley = new TalleyAge();
		$age = 30;
		$ageTalley->countAndCategorize($age);
		$age = 50;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(40, $ageTalley->getAverageAge("45to54"));
	}

    public function testTalleyAgeGetAverageAgeUnder25WithNoData()
    {
		$ageTalley = new TalleyAge();
		$this->assertEquals(0, $ageTalley->getAverageAge("Under25"));
    }

    public function testTalleyAgeGetPercentOfDriversUnder25()
    {
		$ageTalley = new TalleyAge();
		$age = 18;
		$ageTalley->countAndCategorize($age);
		$age = 32;
		$ageTalley->countAndCategorize($age);
		$this->assertEquals(50, $ageTalley->getPercentOfDriverCategory("Under25"));
    }

}
?>
