<?php namespace JimmyDBurrell\DOBStats;

/**
 * StatsOutput
 *
 * @version 1.0
 * @author Jimmy Burrell
 */

class StatsOutput
{
	protected $ageTalleyClone;

	public function __construct($ageTalley)
	{
		$this->ageTalleyClone = clone $ageTalley;
		return $this;
	}

	public function cliOutput()
	{
		echo "Using a total of $recordCounttotal database records...<br />\n";
		echo sprintf(
			'Average driver age is %d based on a sampling of %d drivers.',
			array_sum($ageData)/$this->ageTalleyClone->getDriverCounts("Total"),
			$this->ageTalleyClone->getDriverCounts("Total")
			) . '<br />' . PHP_EOL;

		echo sprintf(
			'Drivers under age 25 total = %d with an average age of %d. These driver represent %3.1d percent of this driver sampling.',
			$this->driverCountUnder25,
			array_sum($ageUnder25)/$this->driverCountUnder25,
			$this->driverCountUnder25 / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 25 to 34 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("25to34"),
			array_sum($age25to34)/$this->ageTalleyClone->getDriverCounts("25to34"),
			$this->ageTalleyClone->getDriverCounts("25to34") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 35 to 44 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("35to44"),
			array_sum($age35to44)/$this->ageTalleyClone->getDriverCounts("35to44"),
			$this->ageTalleyClone->getDriverCounts("35to44") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 45 to 54 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("45to54"),
			array_sum($age45to54)/$this->ageTalleyClone->getDriverCounts("45to54"),
			$this->ageTalleyClone->getDriverCounts("45to54") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 55 to 64 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("55to64"),
			array_sum($age55to64)/$this->ageTalleyClone->getDriverCounts("55to64"),
			$this->ageTalleyClone->getDriverCounts("55to64") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 65 to 74 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("65to74"),
			array_sum($age65to74)/$this->ageTalleyClone->getDriverCounts("65to74"),
			$this->ageTalleyClone->getDriverCounts("65to74") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 75 and over total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$this->ageTalleyClone->getDriverCounts("75AndOver"),
			array_sum($age75AndOver)/$this->ageTalleyClone->getDriverCounts("75AndOver"),
			$this->ageTalleyClone->getDriverCounts("75AndOver") / $this->ageTalleyClone->getDriverCounts("Total") * 100
		) . '<br />' . PHP_EOL;
	}	// end cliOutput
}

