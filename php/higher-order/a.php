<?php
require_once 'Fn.php';

$a = function ($s) {
    return "(${s})";
};

$b = function ($s) {
    return "[${s}]";
};

$c = Fn::compose($a, $b);
echo $c('hello') . "\n";
