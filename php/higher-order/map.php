<?php
require_once 'Fn.php';

$r = Fn::map(function ($a, $b) {
        return $a + $b;
    }, array(1, 3, 5), array(2, 4, 6));

var_dump($r);

