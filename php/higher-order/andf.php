<?php
require_once 'Fn.php';

$f = Fn::andf(
    function ($a) {
        return $a % 2;
    },
    function ($a) {
        return $a < 10;
    }
    );

$r = $f(9);

var_dump($r);
