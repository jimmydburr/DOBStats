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
		$category = array(
			'ageData',
			'ageUnder25',
			'age25to34',
			'age35to44',
			'age45to54',
			'age55to64',
			'age65to74',
			'age75AndOver'
		);

		for ($i=0; $i < count($category); $i++) {
			echo sprintf(
				'Average driver age in category = %s is %d based on a sampling of %d drivers. These driver represent %3.1d percent of this driver sampling.',
				$category[$i],
				$ageTalley->getAverageAge($category[$i]),
				$ageTalley->getDriverCounts($category[$i]),
				$ageTalley->getPercentOfDriverCategory($category[$i])
				) . '<br />' . PHP_EOL;
		}
	}
}

