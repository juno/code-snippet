<?php
function fact($number)
{
    $t = $number;
    if (gmp_div_r((string)$t, 2) == 0) {
        $n = 0;
        $n += 1;
        $t /= 2;
        while (gmp_div_r((string)$t, 2) == 0) {
            $n += 1;
            $t /= 2;
        }
        echo "2, $n\n";
        if ($t == 1) {
            return;
        }
    }
    $limit = floor(sqrt($t));
    for ($i = 3; $i <= $limit; $i += 2) {
        if (gmp_div_r((string)$t, $i) == 0) {
            $n = 0;
            $n += 1;
            $t /= $i;
            while (gmp_div_r((string)$t, $i) == 0) {
                $n += 1;
                $t /= $i;
            }
            echo "$i, $n\n";
            if ($t == 1) {
                return;
            }
            $limit = floor(sqrt($t));
        }
    }
    echo "$t, 1\n";
}

fact(600851475143);
