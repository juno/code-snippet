<?php
require_once dirname(__FILE__) . '/MapEntry.php';

class MapTask
{
    private $list = array();

    public function execute($target)
    {
        for ($i = 0; $i < strlen($target); $i++) {
            $this->list[] = new MapEntry($target[$i], 1);
        }
        usort($this->list, array('MapEntry', 'compare'));
    }

    public function getList()
    {
        return $this->list;
    }
}
