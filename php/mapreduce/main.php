<?php
require_once dirname(__FILE__) . '/lib/CharCounter.php';

$counter = new CharCounter();
$counter->count('abcaba');
echo 'a:' . $counter->getCharCount('a') . "\n";
echo 'b:' . $counter->getCharCount('b') . "\n";
echo 'c:' . $counter->getCharCount('c') . "\n";
