<?php

$b = 100;
$a = $b + 0.1 * $b;
$x = (($a-$b)/$a)*100;

echo $x;