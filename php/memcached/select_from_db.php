<?php
require_once 'Benchmark/Timer.php';
$timer = new Benchmark_Timer();
$timer->start();

$id = 9919;

$conn = pg_connect("user=juno dbname=sandbox");
$result = pg_query($conn, "SELECT * FROM people WHERE id = " . $id);
$person = pg_fetch_array($result);
$timer->setMarker('fetched');
pg_close($conn);

print_r($person);

$timer->stop();
$timer->display();
