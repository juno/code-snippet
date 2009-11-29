<?php
require_once 'Math/RPN.php';

//$expression = "(2^3)+sin(30)-(!4)+(3/4)";
$expression = "3 5 + 1 1 + * sin";
$rpn = new Math_Rpn();
echo $rpn->calculate($expression, 'deg', true) . "\n";
