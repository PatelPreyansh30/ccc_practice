<?php

$number = (int)readline("Enter number: ");

function even_pattern($n1)
{
    for ($i = 1; $i <= $n1; $i++) {
        for ($j = 1; $j < $i; $j++) {
            echo "_";
        };
        for ($j = $i; $j <= $n1; $j++) {
            echo "$j";
        };
        for ($j = 1; $j <= $n1 - $i + 1; $j++) {
            echo $j + $n1;
        };
        for ($j = 1; $j < $i; $j++) {
            echo "_";
        };
        echo "\n";
    };
    for ($i = 1; $i <= $n1 - 1; $i++) {
        for ($j = 1; $j < $n1 - $i; $j++) {
            echo "_";
        };
        for ($j = $n1 - $i; $j <= $n1; $j++) {
            echo "$j";
        };
        for ($j = 1; $j <= $i + 1; $j++) {
            echo $j + $n1;
        };
        for ($j = 1; $j < $n1 - $i; $j++) {
            echo "_";
        };
        echo "\n";
    };
};

function odd_pattern($n1)
{
    for ($i = 1; $i <= $n1; $i++) {
        for ($j = 1; $j < $i; $j++) {
            echo "_";
        };
        for ($j = $i; $j <= $n1; $j++) {
            echo $j;
        };
        for ($j = 1; $j <= $n1 - $i; $j++) {
            echo $j + $n1;
        };
        for ($j = 1; $j < $i; $j++) {
            echo "_";
        };
        echo "\n";
    };
    for ($i = 1; $i <= $n1 - 1; $i++) {
        for ($j = 1; $j < $n1 - $i; $j++) {
            echo "_";
        };
        for ($j = $n1 - $i; $j <= $n1; $j++) {
            echo "$j";
        };
        for ($j = 1; $j <= $i; $j++) {
            echo $j + $n1;
        };
        for ($j = 1; $j < $n1 - $i; $j++) {
            echo "_";
        };
        echo "\n";
    };
};

$number <= 0 ? print("Invalid number") : ($number % 2 == 0 ? even_pattern((int)$number / 2) : odd_pattern((int)ceil($number / 2)));
