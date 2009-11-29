<?php
$table = array();

$handle = fopen('php://stdin', 'r');
while (!feof($handle)) {
    $buffer = fgets($handle);
    for ($i = 0; $i < strlen($buffer); $i++) {
        $char = strtoupper($buffer[$i]);
        if (!preg_match('/^[a-z]$/i', $char)) {
            continue;
        }
        array_key_exists($char, $table) ? $table[$char]++ : $table[$char] = 1;
    }
}

fclose($handle);
ksort($table);
print_r($table);
