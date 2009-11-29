<?php
require_once 'PHPUnit/Framework.php';
require_once realpath(dirname(__FILE__) . '/../lib/MapEntry.php');

class MapEntryTest extends PHPUnit_Framework_TestCase
{
    public function testScenario1()
    {
        $entry = new MapEntry('a', 0);
        $this->assertEquals('a', $entry->getKey());
        $this->assertEquals(0, $entry->getValue());

        $entry = new MapEntry('b', 1);
        $this->assertEquals('b', $entry->getKey());
        $this->assertEquals(1, $entry->getValue());
    }

    public function testConstructor()
    {
        $this->setExpectedException('Exception');
        $entry = new MapEntry('', 1);
    }

    public function testCompare()
    {
        $a = new MapEntry('a', 1);
        $b = new MapEntry('b', 1);
        $this->assertTrue(MapEntry::compare($a, $b) < 0);
        $this->assertTrue(MapEntry::compare($a, $a) == 0);
        $this->assertTrue(MapEntry::compare($b, $a) > 0);
    }

    public function testEquals()
    {
        $a1 = new MapEntry('a', 1);
        $a2 = new MapEntry('a', 2);
        $b1 = new MapEntry('b', 1);
        $this->assertTrue($a1->equals($a2));
        $this->assertFalse($a1->equals($b1));
        $this->assertFalse($a1->equals(null));
    }
}
