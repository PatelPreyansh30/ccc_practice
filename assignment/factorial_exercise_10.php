<?php

// Write a PHP function to calculate the factorial of a given number.

$input_number = (int)readline("Enter number:");

$temp = 1;

for ($i = 2; $i <= $input_number; $i++) {
    $temp *= $i;
};

if ($input_number <= 0) {
    echo "Please enter valid number";
} else {
    echo "Factorial of $input_number is: $temp";
};
