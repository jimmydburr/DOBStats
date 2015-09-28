<?php namespace JimmyDBurrell\DOBStats;

require_once '../../db.php';
require_once '../vendor/autoload.php';

date_default_timezone_set('America/Chicago');

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new \PDO($dsn, DB_USER, DB_PASS);

$beginDateTime = new \DateTime(date('Y-m-d',strtotime('-2 days')));
$beginDate = $beginDateTime->format('Y-m-d');

$sql = 'SELECT id,dob,created_at FROM app where id_customer = 24 order by id desc limit 10';
$stmt = $pdo->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
$stmt->execute();

$data = new DbRowIterator($stmt);
echo 'Getting the age and date-of-birth for drivers who applied after ' . $beginDate . "<br />" . PHP_EOL;
$lastPeriod = new LastPeriodIterator($data, $beginDate);
$ageTalley = new TalleyAge();

foreach ($lastPeriod as $pos => $row) {
	if ($row->dob > "") {
		$dateDiff = new DateDiff($row->dob);
		$age = $dateDiff->diffInYears();
		$ageTalley->countAndCategorize($age);
	} else {
		unset($age);
	}
}   // end foreach ($lastPeriod as $row)
echo "Finished processing $pos driver records.<br />" . PHP_EOL;
$output = new StatsOutput($ageTalley);
$output->cliOutput();
?>
