<?php

use JimmyDBurrell\DOBStats\TalleyAge;

class TalleyAgeTest extends PHPUnit_Framework_TestCase
{
    public function testTalleyAgeCountEqualsOne() 
    {
        $age = 18;
		$ageTalley = new TalleyAge();
        $result = $ageTalley->talleyAge($age);
        echo __LINE__;
		$this->assertEquals(1, $ageTalley->talleyAge($age));
    }    
}
?>