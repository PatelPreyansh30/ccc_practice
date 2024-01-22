<?php

// Write a PHP function to determine whether a given number is prime.

$input_number = (int)readline("Enter number:");

function prime_number($number)
{

    if ($number == 0 || $number == 1) {
        return false;
    } elseif ($number == 2) {
        return true;
    } else {
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0) {
                return false;
                break;
            }
        };
    };
    return true;
};

if (prime_number($input_number)) {
    echo "This is prime number";
} else {
    echo "This is not prime number";
};
