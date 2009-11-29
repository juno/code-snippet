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
