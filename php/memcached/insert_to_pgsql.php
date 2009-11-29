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


$records = 9990;
$conn = pg_connect("user=juno dbname=sandbox");
pg_query($conn, "BEGIN");

for ($i = 0; $i < $records; $i++) {
    $id = $i + 1;
    $age = rand(0, 120);
    $name = generate_name();
    echo "$id: $name ($age)\n";
    $sql = "INSERT INTO people (name, age) VALUES ('$name', $age)";
    pg_query($conn, $sql);
}

pg_query($conn, "COMMIT");
echo "Done.";
