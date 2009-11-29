<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/MapTask.php');

class MapTaskTest extends PHPUnit_Framework_TestCase
{
    public function testScenario1()
    {
        $task = new MapTask();
        $task->execute('bcaa');

        $entries = $task->getList();
        $this->assertEquals(4, count($entries));

        $this->assertType('MapEntry', $entries[0]);
        $this->assertEquals('a', $entries[0]->getKey());
        $this->assertEquals(1, $entries[0]->getValue());

        $this->assertType('MapEntry', $entries[1]);
        $this->assertEquals('a', $entries[1]->getKey());
        $this->assertEquals(1, $entries[1]->getValue());

        $this->assertType('MapEntry', $entries[2]);
        $this->assertEquals('b', $entries[2]->getKey());
        $this->assertEquals(1, $entries[2]->getValue());

        $this->assertType('MapEntry', $entries[3]);
        $this->assertEquals('c', $entries[3]->getKey());
        $this->assertEquals(1, $entries[3]->getValue());
    }
}
