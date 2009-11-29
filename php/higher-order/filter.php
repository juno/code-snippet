<?php
require_once 'Fn.php';

$r = Fn::filter(function ($a) {
        return $a % 2;
    }, array(1, 2, 3, 4, 5));

var_dump($r);
