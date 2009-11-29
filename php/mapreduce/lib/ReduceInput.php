<?php
class ReduceInput
{
    private $key;
    private $list = array();

    public function addToList($entry)
    {
        $this->list[] = $entry;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getList()
    {
        return $this->list;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setList($list)
    {
        $this->list = $list;
    }
}
