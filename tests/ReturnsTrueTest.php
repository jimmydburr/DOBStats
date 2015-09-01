<?php

	use JimmyDBurrell\DOBStats\ReturnsTrue;
	use JimmyDBurrell\DOBStats\GetSomeTruth;

class ReturnsTrueTest extends PHPUnit_Framework_TestCase
{

    public function testTrue()
    {
		$wrt = new ReturnsTrue;
        $this->assertEquals(TRUE, $wrt->willReturnTrue());
    }

	public function testGetTheTruth()
	{
		$wrt = new GetSomeTruth;
		$this->assertEquals(TRUE, $wrt->getTheTruth());
	}

}

?>
