<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/ReduceInput.php');
require_once realpath(dirname(__FILE__) . '/../lib/MapEntry.php');

class ReduceInputTest extends PHPUnit_Framework_TestCase
{
    public function testScenario1()
    {
        $entries = array(
            new MapEntry('a', 1),
            new MapEntry('a', 2),
            new MapEntry('a', 3),
            );

        $input = new ReduceInput();
        $input->setKey('a');
        $input->setList($entries);
        $this->assertEquals('a', $input->getKey());
        $this->assertType('array', $input->getList());
        $this->assertEquals(3, count($input->getList()));
    }

    public function testAddToList()
    {
        $input = new ReduceInput();
        $input->addToList(new MapEntry('a', 1));
        $this->assertEquals(1, count($input->getList()));
        $input->addToList(new MapEntry('b', 1));
        $this->assertEquals(2, count($input->getList()));
    }
}
