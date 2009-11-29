<?php
require_once dirname(__FILE__) . '/ReduceInput.php';

class ReduceInputListFactory
{
    public static function createInstance($entries)
    {
        $list = array();
        $current = null;
        $reduce_input = null;

        foreach ($entries as $entry) {
            if (!$entry->equals($current)) {
                $current = $entry;
                $reduce_input = new ReduceInput();
                $reduce_input->setKey($entry->getKey());
                $list[] = $reduce_input;
            }
            $reduce_input->addToList($entry);
        }

        return $list;
    }
}
