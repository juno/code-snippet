<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/ReduceInputListFactory.php');
require_once realpath(dirname(__FILE__) . '/../lib/ReduceInput.php');
require_once realpath(dirname(__FILE__) . '/../lib/MapEntry.php');

class ReduceInputListFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testScenario1()
    {
        $entries = array(
            new MapEntry('a', 1),
            new MapEntry('a', 2),
            new MapEntry('a', 3),
            new MapEntry('b', 1),
            new MapEntry('c', 2),
            );

        $reduce_inputs = ReduceInputListFactory::createInstance($entries);
        $this->assertType('array', $reduce_inputs);
        $this->assertEquals(3, count($reduce_inputs));

        $this->assertEquals('a', $reduce_inputs[0]->getKey());
        $this->assertEquals(3, count($reduce_inputs[0]->getList()));

        $this->assertEquals('b', $reduce_inputs[1]->getKey());
        $this->assertEquals(1, count($reduce_inputs[1]->getList()));

        $this->assertEquals('c', $reduce_inputs[2]->getKey());
        $this->assertEquals(1, count($reduce_inputs[2]->getList()));
    }
}
