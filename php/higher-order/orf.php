<?php
require_once 'Fn.php';

$f = Fn::orf(
    function ($a) {
        return $a % 2;
    },
    function ($a) {
        return $a < 10;
    }
    );

$r = $f(20);

var_dump($r);
