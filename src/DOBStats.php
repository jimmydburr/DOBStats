<?php namespace JimmyDBurrell\DOBStats;

require_once '../../db.php';
require_once '../vendor/autoload.php';

date_default_timezone_set('America/Chicago');

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new \PDO($dsn, DB_USER, DB_PASS);

$beginDateTime = new \DateTime(date('Y-m-d',strtotime('-5 days')));
$beginDate = $beginDateTime->format('Y-m-d');

$sql = 'SELECT id,dob,created_at FROM app order by id desc limit 10000';
$stmt = $pdo->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
$stmt->execute();

$data = new DbRowIterator($stmt);
echo 'Getting the age and date-of-birth for drivers who applied after ' . $beginDate . PHP_EOL . '<br />';
$lastPeriod = new LastPeriodIterator($data, $beginDate);

$ageData = array();
$ageUnder25 = array();
$age25to34 = array();
$age35to44 = array();
$age45to54 = array();
$age55to64 = array();
$age65to74 = array();
$age75AndOver = array();

foreach ($lastPeriod as $pos => $row) {
	if (isset($row->dob) && $row->dob > "") {
		$dateDiff = new DateDiff($row->dob);
		$age = $dateDiff->diffInYears();
	} else {
		unset($age);
	}
	if (isset($age) and $age < 80) {
		$ageData [] = $age;
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
	}   // end is (isset($age) and $age < 80)
}   // end foreach ($lastPeriod as $row)

$recordCounttotal = $pos;
$driverCountTotal = count($ageData);
$driverCountUnder25 = count($ageUnder25);
$driverCount25to34 = count($age25to34);
$driverCount35to44 = count($age35to44);
$driverCount45to54 = count($age45to54);
$driverCount55to64 = count($age55to64);
$driverCount65to74 = count($age65to74);
$driverCount75AndOver = count($age75AndOver);

echo "Using a total of $recordCounttotal database records...\n<br />";
echo sprintf(
    'Average driver age is %d based on a sampling of %d drivers.',
	array_sum($ageData)/$driverCountTotal,
	$driverCountTotal
	) . PHP_EOL . '<br />';

echo sprintf(
	'Drivers under age 25 total = %d with an average age of %d. These driver represent %3.1d percent of this driver sampling.',
	$driverCountUnder25,
	array_sum($ageUnder25)/$driverCountUnder25,
	$driverCountUnder25 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 25 to 34 total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount25to34,
	array_sum($age25to34)/$driverCount25to34,
	$driverCount25to34 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 35 to 44 total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount35to44,
	array_sum($age35to44)/$driverCount35to44,
	$driverCount35to44 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 45 to 54 total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount45to54,
	array_sum($age45to54)/$driverCount45to54,
	$driverCount45to54 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 55 to 64 total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount55to64,
	array_sum($age55to64)/$driverCount55to64,
	$driverCount55to64 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 65 to 74 total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount65to74,
	array_sum($age65to74)/$driverCount65to74,
	$driverCount65to74 / $driverCountTotal * 100
) . PHP_EOL . '<br />';
echo sprintf(
	'Drivers age 75 and over total = %d with an average age of %d. These driver represent %3.3s percent of this driver sampling.',
	$driverCount75AndOver,
	array_sum($age75AndOver)/$driverCount75AndOver,
	$driverCount75AndOver / $driverCountTotal * 100
) . PHP_EOL . '<br />';
?>
