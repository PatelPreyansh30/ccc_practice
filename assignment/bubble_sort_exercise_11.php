<?php

$array_to_sort = [64, 34, 25, 12, 22, 11, 90];
$size = sizeof($array_to_sort);

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size - $i - 1; $j++) {
        if ($array_to_sort[$j] > $array_to_sort[$j + 1]) {
            $temp = $array_to_sort[$j];
            $array_to_sort[$j] = $array_to_sort[$j + 1];
            $array_to_sort[$j + 1] = $temp;
        };
    };
    echo PHP_EOL;
};

print_r($array_to_sort);
