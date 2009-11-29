<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/ReduceTask.php');
require_once realpath(dirname(__FILE__) . '/../lib/CharCounter.php');
require_once realpath(dirname(__FILE__) . '/../lib/ReduceInput.php');
require_once realpath(dirname(__FILE__) . '/../lib/MapEntry.php');

class ReduceTaskTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        $entries = array(
            new MapEntry('a', 1),
            new MapEntry('a', 2),
            new MapEntry('a', 3),
            );

        $reduce_input = $this->getMock('ReduceInput', array('getList'));
        $reduce_input->expects($this->any())->method('getList')->will($this->returnValue($entries));

        $task = new ReduceTask();
        $task->execute($reduce_input);
        $this->assertEquals(3, $task->getCount());
    }
}
