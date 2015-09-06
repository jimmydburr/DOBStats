<?php namespace JimmyDBurrell\DOBStats;

require_once '../../db.php';
require_once '../vendor/autoload.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new \PDO($dsn, DB_USER, DB_PASS);

$beginDateTime = new \DateTime('2015-09-04');
$beginDate = $beginDateTime->format('Y-m-d');

$sql = 'SELECT id,dob,created_at FROM app ORDER BY id DESC limit 2500';
$stmt = $pdo->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
$stmt->execute();

$data = new DbRowIterator($stmt);
echo 'Getting the age and date-of-birth for drivers who applied after ' . $beginDate . PHP_EOL;
$lastPeriod = new LastPeriodIterator($data, $beginDate);
$ageData = array();

foreach ($lastPeriod as $pos => $row) {
	if (isset($row->dob) && $row->dob > "") {
		$dateDiff = new DateDiff($row->dob);
		$age = $dateDiff->diffInYears();
	} else {
		unset($age);
	}
	if (isset($age) and $age < 80) {
		$ageData [] = $age;
		echo sprintf(
			'%d. age = %s | dob %s',
			$pos,
			$age,
			$row->dob
		) . PHP_EOL;
	}
}
echo sprintf('Average driver age is %d based on a sampling of %d drivers.',
			array_sum($ageData)/count($ageData),
			count($ageData)
			) . PHP_EOL;
?>
