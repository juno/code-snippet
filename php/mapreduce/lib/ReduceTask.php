<?php
require_once dirname(__FILE__) . '/CharCounter.php';

class ReduceTask
{
    private $count = 0;

    public function execute(ReduceInput $input)
    {
        $this->count = count($input->getList());
        CharCounter::emit($input, $this->count);
    }

    public function getCount()
    {
        return $this->count;
    }
}
