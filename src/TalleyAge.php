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

	public function getDriverCounts($whichArray)
	{
		switch ($whichArray) {

			case $whichArray = "Total":
				return count($this->ageData);
				break;

			case $whichArray = "Under25":
				return count($this->ageUnder25);
				break;

			case $whichArray = "25to34":
				return count($this->age25to34);
				break;

			case $whichArray = "35to44":
				return count($this->age35to44);
				break;

			case $whichArray = "45to54":
				return count($this->age45to54);
				break;

			case $whichArray = "55to64":
				return count($this->age55to64);
				break;

			case $whichArray = "65to74":
				return count($this->age65to74);
				break;

			case $whichArray = "75AndOver":
				return count($this->age75AndOver);
				break;

			default:
				return false;
				break;
		}	// end switch ($whichArray)
	}	// end function getDriverCounts($whichArray)
}
