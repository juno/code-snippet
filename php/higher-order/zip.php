<?php
require_once 'Fn.php';

$a = array(1, 2, 3);
$b = array(10, 20, 30);
$c = array(100, 200, 300);

$r = Fn::zip($a, $b, $c);

var_dump($r);
