<?php

// casting to Integer

$input = 10.25; // 10 int(10)
$input = true; // 1 int(1)
$input = false; // 0 int(0)
$input = null; // 0 int(0)
$input = "25%"; // 25 int(25)
$input = "hello"; // 0 int(0)
$input = "hello 123"; // 0 int(0)
$output = (int)$input;
echo $output;
var_dump($output);


// Casting to Float

$input = 10; // 10 float(10)
$input = true; // 1 float(1)
$input = false; // 0 float(0)
$input = null; // 0 float(0)
$input = "25%"; // 25 float(25)
$input = "hello"; // 0 float(0)
$input = "hello 123"; // 0 float(0)
$output = (float)$input;
echo $output;
var_dump($output);


// Casting to String

$input = 150; // 150 string(3)"150"
$input = 10.25; // 10.25 string(5)"10.25"
$input = true; // 1 string(1)"1"
$input = false; // string(0)""
$input = null; // string(0)""
$output = (string)$input;
echo $output;
var_dump($output);


// Casting to Boolean

$input = 10; // 1 bool(true)
$input = 1; // 1 bool(true)
$input = 0; // bool(false)
$input = 125.65; // 1 bool(true)
$input = null; // bool(false)
$input = "25%"; // 1 bool(true)
$input = "hello"; // 1 bool(true)
$input = ""; // bool(false)
$output = (bool)$input;
echo $output;
var_dump($output);


// Casting to Array

$input = 1; // Arrayarray(1)
$input = 0; // Arrayarray(1)
$input = 125.65; // Arrayarray(1)
$input = "25%"; // Arrayarray(1)
$input = "hello"; // Arrayarray(1)
$output = (array)$input;
print_r($output);
var_dump($output);
