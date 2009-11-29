<?php
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$char_length = strlen($chars);
$length = 10;

srand();

$buf = '';
for ($i = 0; $i < $length; $i++) {
    $idx = rand(0, $char_length - 1);
    $buf .= $chars[$idx];
}
echo $buf . "\n";
