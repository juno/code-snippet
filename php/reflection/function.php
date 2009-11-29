<?php
/**
 * hello
 */
function fact($n)
{
    if ($n == 0) {
        return 0;
    }

    return $n + fact($n - 1);
}

$func = new ReflectionFunction('fact');
echo "Name: " . $func->getName() . "\n";
echo "Document:\n";
echo $func->getDocComment() . "\n";
