<?php
require_once 'Fn.php';

$r = Fn::foldl(function ($accumulated, $next) {
        return $accumulated - $next;
    }, 100, array(1, 2, 3));

var_dump($r);
