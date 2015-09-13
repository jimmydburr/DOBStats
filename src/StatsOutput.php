<?php namespace JimmyDBurrell\DOBStats;

/**
 * StatsOutput
 *
 * @version 1.0
 * @author Jimmy Burrell
 */

class StatsOutput
{

	public function cliOutput($ageTalley)
	{
		echo sprintf(
			'Average driver age is %d based on a sampling of %d drivers.',
			$ageTalley->getAverageAge("Total"),
			$ageTalley->getDriverCounts("Total")
			) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers under age 25 total = %d with an average age of %d. These driver represent %3.1d percent of this driver sampling.',
			$ageTalley->getDriverCounts("Under25"),
			$ageTalley->getAverageAge("Under25"),
			$ageTalley->getPercentOfDriverCategory("Under25")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 25 to 34 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("25to34"),
			$ageTalley->getAverageAge("25to34"),
			$ageTalley->getPercentOfDriverCategory("25to34")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 35 to 44 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("35to44"),
			$ageTalley->getAverageAge("35to44"),
			$ageTalley->getPercentOfDriverCategory("35to44")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 45 to 54 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("45to54"),
			$ageTalley->getAverageAge("45to54"),
			$ageTalley->getPercentOfDriverCategory("45to54")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 55 to 64 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("55to64"),
			$ageTalley->getAverageAge("55to64"),
			$ageTalley->getPercentOfDriverCategory("55to64")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 65 to 74 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("65to74"),
			$ageTalley->getAverageAge("65to74"),
			$ageTalley->getPercentOfDriverCategory("65to74")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 75 and over total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("75AndOver"),
			$ageTalley->getAverageAge("75AndOver"),
			$ageTalley->getPercentOfDriverCategory("75AndOver")
		) . '<br />' . PHP_EOL;
	}	// end cliOutput
}

