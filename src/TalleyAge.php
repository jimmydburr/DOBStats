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

    public function tallyAge($age)
    {
        $this->age = $age;
        $ageData [] = $age;
        echo "array ageData count = " . count($ageData) . "\n";
        return count($ageData);
    }

}
