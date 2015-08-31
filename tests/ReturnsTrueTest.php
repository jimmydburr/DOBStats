<?php

use JimmyDBurrell\DOBStats\ReturnsTrue;

class ReturnsTrueTest extends PHPUnit_Framework_TestCase
{

    public function testTrue()
    {
		$wrt = new ReturnsTrue;
        $this->assertEquals(TRUE, $wrt->willReturnTrue());
    }

    public function testFalse()
    {
		$wrt = new ReturnsTrue;
        $this->assertEquals(FALSE, $wrt->willReturnTrue());
    }
}

class Returns2TrueTest extends PHPUnit_Framework_TestCase
{

	public function test2True()
	{
		$wrt = new Returns2True;
		$this->assertEquals(TRUE, $wrt->willReturnTrue());
	}

	public function test2False()
	{
		$wrt = new Returns2True;
		$this->assertEquals(FALSE, $wrt->willReturnTrue());
	}
}
?>
