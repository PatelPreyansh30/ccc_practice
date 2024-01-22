<?php

// Write a PHP function to generate the Fibonacci sequence up to a specified number of terms.

$input_number = (int)readline("Enter number:");

$array = [0, 1];

for ($i = 2; $i <= $input_number; $i++) {
    $temp = $array[$i - 1] + $array[$i - 2];
    array_push($array, $temp);
};

if ($input_number <= 0) {
    echo "Please enter valid number";
} else {
    for ($i = 0; $i < $input_number; $i++) {
        echo "$array[$i] ";
    };
};
