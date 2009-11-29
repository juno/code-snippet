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

var_dump(is_palindromic_number(1));
var_dump(is_palindromic_number(10));
var_dump(is_palindromic_number(11));
var_dump(is_palindromic_number(100));
var_dump(is_palindromic_number(202));
var_dump(is_palindromic_number(1001));
var_dump(is_palindromic_number(900099));
