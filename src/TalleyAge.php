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
    /** @var int $age The driver's age. */
    protected $age = 0;
    /** @var array $ageData The array which holds all driver ages. */
    protected $ageData = array();
    /** @var array $ageUnder25 The array which holds driver ages under 25. */
    protected $ageUnder25 = array();
    /** @var array $age25to34 The array which holds driver ages 25 to 34. */
    protected $age25to34 = array();
    /** @var array $age35to44 The array which holds driver ages 35 to 44. */
    protected $age35to44 = array();
    /** @var array $age45to54 The array which holds driver ages 45 to 54. */
    protected $age45to54 = array();
    /** @var array $age55to64 The array which holds driver ages 55 to 64. */
    protected $age55to64 = array();
    /** @var array $age65to74 The array which holds driver ages 65 to 74. */
    protected $age65to74 = array();
    /** @var array $age75AndOver The array which holds driver ages 75 and over. */
    protected $age75AndOver = array();


    public function __construct()
	{
	}


    public function tallyAge($age)
    {
        $this->age = $age;
        $ageData [] = $age;
        echo "array ageData count = " . count($ageData) . "\n";
        return count($ageData);
    }
}
