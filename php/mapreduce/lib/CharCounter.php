<?php
require_once dirname(__FILE__) . '/MapTask.php';
require_once dirname(__FILE__) . '/ReduceInput.php';
require_once dirname(__FILE__) . '/ReduceInputListFactory.php';
require_once dirname(__FILE__) . '/ReduceTask.php';

class CharCounter
{
    public static $char_count = array();

    public static function emit(ReduceInput $input, $count)
    {
        self::$char_count[$input->getKey()] = $count;
    }

    public function count($target)
    {
        self::$char_count = array();
        $map = new MapTask();
        $map->execute($target);

        $reduce_task = new ReduceTask();
        $input_list = ReduceInputListFactory::createInstance($map->getList());
        foreach ($input_list as $input) {
            $reduce_task->execute($input);
        }
    }

    public function getCharCount($char)
    {
        return self::$char_count[$char];
    }
}

