<?php
class Gmp
{
    private $number;

    public static function gcd(Gmp $a, Gmp $b)
    {
        return new Gmp(gmp_gcd($a->getNumber(), $b->getNumber()));
    }

    public function __construct($number, $base = 0)
    {
        if (!function_exists('gmp_init')) {
            throw new Exception("gmp module is not available");
        }

        if (is_resource($number)) {
            $this->number = gmp_strval($number);
        } else {
            $this->number = $base == 0 ? gmp_init($number) : gmp_init($number, $base);
        }
    }

    public function __toString()
    {
        return gmp_strval($this->number);
    }

    public function getNumber()
    {
        return $this->number;
    }
}

$a = new Gmp(18);
$b = new Gmp(97);
$c = Gmp::gcd($a, $b);
echo $c . "\n";
