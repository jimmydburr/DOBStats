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

    public function record($age)
    {
        $this->age = $age;
        $ageData [] = $age;
        return count($ageData);
    }

	public function categorize($age)
	{
		switch ($age) {
			case $age < 25:
				$ageUnder25 [] = $age;
				break;

			case $age >= 25 && $age < 35:
				$age25to34 [] = $age;
				break;

			case $age >= 35 && $age < 45:
				$age35to44 [] = $age;
				break;

			case $age >= 45 && $age < 55:
				$age45to54 [] = $age;
				break;

			case $age >= 55 && $age < 65:
				$age55to64 [] = $age;
				break;

			case $age >= 65 && $age < 75:
				$age65to74 [] = $age;
				break;

			case $age >= 75:
				$age75AndOver [] = $age;
				break;

			default:
				break;
		}   // end switch
	}
}
