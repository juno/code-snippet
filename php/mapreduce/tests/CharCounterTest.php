<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/CharCounter.php');

class CharCounterTest extends PHPUnit_Framework_TestCase
{
    public function testEmit()
    {
        $reduce_input = $this->getMock('ReduceInput', array('getKey'));
        $reduce_input->expects($this->any())
            ->method('getKey')
            ->will($this->returnValue('a'));

        CharCounter::emit($reduce_input, 2);

        $this->assertEquals(1, count(CharCounter::$char_count));
        $this->assertEquals(2, CharCounter::$char_count[$reduce_input->getKey()]);
    }

    public function testScenario1()
    {
        $counter = new CharCounter();
        $counter->count('abca');
        $this->assertEquals(3, count(CharCounter::$char_count));
        $this->assertEquals(1, count(CharCounter::$char_count['a']));
        $this->assertEquals(1, count(CharCounter::$char_count['b']));
        $this->assertEquals(1, count(CharCounter::$char_count['c']));

        $this->assertEquals(2, $counter->getCharCount('a'));
        $this->assertEquals(1, $counter->getCharCount('b'));
        $this->assertEquals(1, $counter->getCharCount('c'));
    }
}