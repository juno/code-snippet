<?php
require_once 'Benchmark/Timer.php';
$timer = new Benchmark_Timer();
$timer->start();

$id = 9919;

$memcache = new Memcache();
$memcache->connect('localhost', 11211) or die("Couldn't connect to server'");

$person = $memcache->get($id);

$timer->setMarker('fetched');

print_r($person);

$timer->stop();
$timer->display();
