<?php

use JimmyDBurrell\DOBStats\TalleyAge;

class TalleyAgeTest extends PHPUnit_Framework_TestCase
{

    public function testTalleyAgeCountEqualsOne() 
    {
        $age = 18;
		$ageTalley = new TalleyAge();
        var_dump($ageTalley);
        $result = $ageTalley->talleyAge($age);
        var_dump($result);
        echo __LINE__;
		$this->assertEquals(1, $ageTalley->talleyAge($age));
    }

}
?>