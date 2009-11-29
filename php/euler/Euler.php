<?php
class Euler
{
    private static $delegate = null;

    public static init()
    {
        if (function_exists('gmp_init')) {
            self::$delegate = new Euler_Gmp;
        }
    }

    public static function gcd($m, $n)
    {
        if ($gmp_available) {
        } else {
        }
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

        return self::gcd($n, $m);
    }
}
