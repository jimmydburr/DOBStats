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
		//switch ($whichDrivers) {

			//case "Total":
				//return count($this->ageData);
				//break;

			//case "Under25":
				//return count($this->ageUnder25);
				//break;

			//case "25to34":
				//return count($this->age25to34);
				//break;

			//case "35to44":
				//return count($this->age35to44);
				//break;

			//case "45to54":
				//return count($this->age45to54);
				//break;

			//case "55to64":
				//return count($this->age55to64);
				//break;

			//case "65to74":
				//return count($this->age65to74);
				//break;

			//case "75AndOver":
				//return count($this->age75AndOver);
				//break;

			//default:
				//return false;
				//break;
		//}	// end switch ($whichDrivers)
	}	// end function getDriverCounts($whichDrivers)

	public function getAverageAge($whichDrivers)
	{

		$sumDriverAge = array_sum($this->$whichDrivers);
		if ($sumDriverAge > 0) {
			return $sumDriverAge / count($this->$whichDrivers);
		} else {
			return 0;
		}
   /*     switch ($whichDrivers) {*/

			//case "Total":
				//$sumDriverAge = array_sum($this->ageData);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->ageData);
				//} else {
					//return 0;
				//}
				//break;

			//case "Under25":
				//$sumDriverAge = array_sum($this->ageUnder25);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->ageUnder25);
				//} else {
					//return 0;
				//}
				//break;

			//case "25to34":
				//$sumDriverAge = array_sum($this->age25to34);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age25to34);
				//} else {
					//return 0;
				//}
				//break;

			//case "35to44":
				//$sumDriverAge = array_sum($this->age35to44);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age35to44);
				//} else {
					//return 0;
				//}
				//break;

			//case "45to54":
				//$sumDriverAge = array_sum($this->age45to54);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age45to54);
				//} else {
					//return 0;
				//}
				//break;

			//case "55to64":
				//$sumDriverAge = array_sum($this->age55to64);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age55to64);
				//} else {
					//return 0;
				//}
				//break;

			//case "65to74":
				//$sumDriverAge = array_sum($this->age65to74);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age65to74);
				//} else {
					//return 0;
				//}
				//break;

			//case "75AndOver":
				//$sumDriverAge = array_sum($this->age75AndOver);
				//if ($sumDriverAge > 0) {
					//return $sumDriverAge / count($this->age75AndOver);
				//} else {
					//return 0;
				//}
				//break;

			//default:
				//return false;
				//break;
		/*}	// end switch ($whichDrivers)*/
	}	// end function getAverageAge

	public function getPercentOfDriverCategory($whichDrivers)
	{
		$countDriverTotal = count($this->ageData);
		if ($countDriverTotal > 0) {
			$countDriverCategory = count($this->$whichDrivers);
			return $countDriverCategory / $countDriverTotal * 100;
			//switch ($whichDrivers) {

				//case "Under25":
					//$countDriverCategory = count($this->ageUnder25);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "25to34":
					//$countDriverCategory = count($this->age25to34);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "35to44":
					//$countDriverCategory = count($this->age35to44);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "45to54":
					//$countDriverCategory = count($this->age45to54);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "55to64":
					//$countDriverCategory = count($this->age55to64);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "65to74":
					//$countDriverCategory = count($this->age65to74);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//case "75AndOver":
					//$countDriverCategory = count($this->age75AndOver);
					//return $countDriverCategory / $countDriverTotal * 100;
					//break;

				//default:
					//return false;
					//break;
			//}	// end switch ($whichDrivers)
		} else {
			return 0;	// no drivers
		}	// end if ($countDriverTotal > 0)
	}
}
