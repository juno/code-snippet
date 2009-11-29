<?php
function is_palindromic_number($n)
{
    if (strlen($n) == 1) {
        return true;
    }

    if (strlen($n) == 2) {
        if (substr($n, 0, 1) == substr($n, 1, 1)) {
            return true;
        }
        return false;
    }

    if (substr($n, 0, 1) == substr($n, strlen($n) - 1, 1)) {
        $x = substr($n, 1, strlen($n) - 2);
        if (is_palindromic_number($x)) {
            return true;
        }
    }

    return false;
}


$max = 0;
for ($i = 100; $i <= 999; $i++) {
    for ($j = $i; $j <= 999; $j++) {
        $num = $i * $j;
        if (is_palindromic_number($num) && $num > $max) {
            $max = $num;
        }
    }
}

echo "$max\n";
