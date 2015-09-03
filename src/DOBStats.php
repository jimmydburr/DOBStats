<?php namespace JimmyDBurrell\DOBStats;

require_once '../db.php';
require_once './vendor/autoload.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$db = new \PDO($dsn, DB_USER, DB_PASS);

$sql = 'SELECT * FROM `gen_contact` ORDER BY `contact_modified` DESC';
$stmt = $pdo->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
$stmt->execute();

$data = new DbRowIterator($stmt);
echo 'Getting the contacts that changed the last 3 months' . PHP_EOL;
$lastPeriod = new LastPeriodIterator($data, '2015-04-01 00:00:00');
foreach ($lastPeriod as $row) {
    echo sprintf(
        '%s (%s)| modified %s',
        $row->contact_name,
        $row->contact_email,
        $row->contact_modified
    ) . PHP_EOL;
}
?>
