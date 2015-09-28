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
			$ageTalley->getAverageAge("ageageData"),
			$ageTalley->getDriverCounts("ageageData")
			) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers under age 25 total = %d with an average age of %d. These driver represent %3.1d percent of this driver sampling.',
			$ageTalley->getDriverCounts("ageageUnder25"),
			$ageTalley->getAverageAge("ageageUnder25"),
			$ageTalley->getPercentOfDriverCategory("ageageUnder25")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 25 to 34 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("ageage25to34"),
			$ageTalley->getAverageAge("ageage25to34"),
			$ageTalley->getPercentOfDriverCategory("ageage25to34")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 35 to 44 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("age35to44"),
			$ageTalley->getAverageAge("age35to44"),
			$ageTalley->getPercentOfDriverCategory("age35to44")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 45 to 54 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("age45to54"),
			$ageTalley->getAverageAge("age45to54"),
			$ageTalley->getPercentOfDriverCategory("age45to54")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 55 to 64 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("age55to64"),
			$ageTalley->getAverageAge("age55to64"),
			$ageTalley->getPercentOfDriverCategory("age55to64")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 65 to 74 total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("age65to74"),
			$ageTalley->getAverageAge("age65to74"),
			$ageTalley->getPercentOfDriverCategory("age65to74")
		) . '<br />' . PHP_EOL;
		echo sprintf(
			'Drivers age 75 and over total = %d with an average age of %d. These driver represent %3.4s percent of this driver sampling.',
			$ageTalley->getDriverCounts("age75AndOver"),
			$ageTalley->getAverageAge("age75AndOver"),
			$ageTalley->getPercentOfDriverCategory("age75AndOver")
		) . '<br />' . PHP_EOL;
	}	// end cliOutput
}

