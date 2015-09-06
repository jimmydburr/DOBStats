<?php

require_once '../../db.php';
require_once 'DbRowIterator.php';
require_once 'LastPeriodIterator.php';
//require_once './vendor/autoload.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$pdo = new PDO($dsn, DB_USER, DB_PASS);

$sql = "SELECT id,email,created_at FROM app WHERE id_customer = 24 ORDER BY id DESC limit 2500";
$stmt = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
$stmt->execute();

$data = new DbRowIterator($stmt);
echo 'Getting the contacts that changed the last 2 days' . PHP_EOL;
$lastPeriod = new LastPeriodIterator($data, '2015-09-04 00:00:00');
foreach ($lastPeriod as $pos => $row) {
	echo sprintf(
		'%d %s (%s)| modified %s',
		$pos,
		$row->id,
		$row->email,
		$row->created_at
	) . PHP_EOL;
}
?>
