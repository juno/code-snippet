<?php
function gcd($m, $n)
{
    if ($m < $n) {
        return -1;
    }

    if ($n == 0) {
        return $m;
    }

    $m = $m % $n;
    if ($m == 0) {
        return $n;
    }

    return gcd($n, $m);
}

function lcd($a, $b)
{
    if ($a < $b) {
        $c = $a;
        $a = $b;
        $b = $c;
    }

    //return ($a * $b) / gmp_intval(gmp_gcd($a, $b));
    return ($a * $b) / gcd($a, $b);
}

function calculate($max)
{
    if ($max == 1) {
        return 1;
    }

    return lcd($max, calculate($max - 1));
}

echo calculate(20) . "\n";
