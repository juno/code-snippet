<?php
function generate_name()
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $char_length = strlen($chars);
    $length = 10;

    srand();

    $buf = '';
    for ($i = 0; $i < $length; $i++) {
        $idx = rand(0, $char_length - 1);
        $buf .= $chars[$idx];
    }
    return $buf;
}


$records = 10000;
$memcache = new Memcache();
$memcache->connect('localhost', 11211) or die("Couldn't connect to server'");

for ($i = 0; $i < $records; $i++) {
    $id = $i + 1;
    $age = rand(0, 120);
    $name = generate_name();
    echo "$id: $name ($age)\n";
    $person = array(
        'name' => $name,
        'age' => $age,
        );
    $memcache->set($id, $person, false, 300) or die("Couldn't store data'");
}

echo "Done.";
