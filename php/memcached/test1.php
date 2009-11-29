<?php
$memcache = new Memcache();
$memcache->connect('localhost', 11211) or die("Couldn't connect to server'");

$version = $memcache->getVersion();
echo "Server version: " . $version . "\n";

$tmp_object = new stdClass();
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

$memcache->set('key', $tmp_object, false, 10) or die("Couldn't store data'");
echo "Store data to cache (Lifetime is 10sec)\n";

$result = $memcache->get('key');
echo "Fetched:\n";
var_dump($result);
