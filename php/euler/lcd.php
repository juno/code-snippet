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

    return ($a * $b) / gcd($a, $b);
}

var_dump(lcd(20, lcd(19, lcd(18, lcd(17, lcd(16, lcd(15, lcd(14, lcd(13, lcd(12, lcd(11, lcd(10, lcd(9, lcd(8, lcd(7, lcd(6, lcd(5, lcd(4, lcd(3, lcd(2, 1))))))))))))))))))));
