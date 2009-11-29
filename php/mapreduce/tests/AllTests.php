<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/CharCounterTest.php';
require_once dirname(__FILE__) . '/MapEntryTest.php';
require_once dirname(__FILE__) . '/MapTaskTest.php';
require_once dirname(__FILE__) . '/ReduceInputListFactoryTest.php';
require_once dirname(__FILE__) . '/ReduceInputTest.php';
require_once dirname(__FILE__) . '/ReduceTaskTest.php';

class AllTests
{
    public static function suite() {
        $suite = new PHPUnit_Framework_TestSuite('MapReduce');
        $suite->addTestSuite('CharCounterTest');
        $suite->addTestSuite('MapEntryTest');
        $suite->addTestSuite('MapTaskTest');
        $suite->addTestSuite('ReduceInputListFactoryTest');
        $suite->addTestSuite('ReduceInputTest');
        $suite->addTestSuite('ReduceTaskTest');
        return $suite;
    }
}
