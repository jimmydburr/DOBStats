<?php namespace JimmyDBurrell\DOBStats;

/**
 * TalleyAge takes an age integer and counts it, storing that count
 * in such a way as to enable some statistical reporting.
 *
 * @version 1.0
 * @author Jimmy Burrell
 */

class TalleyAge
{
    protected $age = 0;
    protected $ageData = array();
    protected $ageUnder25 = array();
    protected $age25to34 = array();
    protected $age35to44 = array();
    protected $age45to54 = array();
    protected $age55to64 = array();
    protected $age65to74 = array();
    protected $age75AndOver = array();

	public function countAndCategorize($age)
	{
        $this->age = $age;
        $this->ageData [] = $age;
		switch ($age) {
			case $age < 25:
				$this->ageUnder25 [] = $age;
				return true;
				break;

			case $age >= 25 && $age < 35:
				$this->age25to34 [] = $age;
				return true;
				break;

			case $age >= 35 && $age < 45:
				$this->age35to44 [] = $age;
				return true;
				break;

			case $age >= 45 && $age < 55:
				$this->age45to54 [] = $age;
				return true;
				break;

			case $age >= 55 && $age < 65:
				$this->age55to64 [] = $age;
				return true;
				break;

			case $age >= 65 && $age < 75:
				$this->age65to74 [] = $age;
				return true;
				break;

			case $age >= 75:
				$this->age75AndOver [] = $age;
				return true;
				break;

			default:
				return false;
				break;
		}   // end switch
	}	// end class

	public function getDriverCounts($whichDrivers)
	{
		return count($this->$whichDrivers);
	}

	public function getAverageAge($whichDrivers)
	{
		$sumDriverAge = array_sum($this->$whichDrivers);
		if ($sumDriverAge > 0) {
			return $sumDriverAge / count($this->$whichDrivers);
		} else {
			return 0;
		}
	}

	public function getPercentOfDriverCategory($whichDrivers)
	{
		$countDriverTotal = count($this->ageData);
		if ($countDriverTotal > 0) {
			$countDriverCategory = count($this->$whichDrivers);
			return $countDriverCategory / $countDriverTotal * 100;
		} else {
			return 0;	// no drivers
		}
	}

}
