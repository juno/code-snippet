<?php
class MapEntry
{
    private $key;
    private $value;

    public static function compare(MapEntry $a, MapEntry $b)
    {
        return ord($a->getKey()) - ord($b->getKey());
    }

    public function __construct($key, $value)
    {
        if (!is_string($key) || strlen($key) != 1) {
            throw new Exception('Invalid char');
        }
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function equals($other)
    {
        return is_callable(array($other, 'getKey')) && $this->getKey() == $other->getKey();
    }
}