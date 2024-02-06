<?php

// Array Creation and Initialization
// $array1 = ["null", 18, 15];
// $array2 = array(1, 10, 356, "string");
// $array3 = ["string", 20, 30];

// print_r($array);

// $output = array_merge($array1,$array2);
// print_r($output);

// $output = array_combine($array1,$array3);
// print_r($output);

// $output = range(10,20,2);
// $output = range("A","Z",2);
// print_r($output);


// Array Modification
// $output = array_push($array1,"A");
// print_r($array1);

// $output = array_pop($array1);
// print_r($array1);

// $output = array_unshift($array1,'A','B','C');
// print_r($array1);

// $output = array_shift($array1);
// print_r($array1);

// $output = array_shift($array1);
// print_r($array1);

// $output = array_splice($array1,0,2,['A','D']);
// print_r($array1);


// Array Access
// echo count($array1);

// echo sizeof($array1);

// var_dump(array_key_exists("2",$array2));

// var_dump(array_keys($array2));

// var_dump(array_values($array2));


// Array Search

// $associative_array = ["b" => "banana", "a" => "apple", "c" => "cherry"];
// var_dump(in_array("xyz", $array2));
// var_dump(in_array("xyz", $associative_array));
// var_dump(in_array("apple", $associative_array));

// var_dump(array_search("string", $array2));
// var_dump(array_search("apple", $associative_array));

// var_dump(array_reverse($array2));


// Array Sorting
// $associative_array = ["b" => "banana", "a" => "apple", "c" => "cherry"];

// sort($associative_array);
// var_dump($associative_array);

// rsort($associative_array);
// var_dump($associative_array);

// asort($associative_array);
// arsort($associative_array);
// ksort($associative_array);
// krsort($associative_array);

// var_dump($associative_array);


// Array Filtering
// $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// $filtterd_array = array_filter($array, function ($number) {
//     return $number <= 5;
// });
// print_r($filtterd_array);

// $mapped_array = array_map(function ($number) {
//     return $number + 10;
// }, $array);
// print_r($mapped_array);

// $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// $reduced_array = array_reduce($array, function ($carry, $number) {
//     echo $carry;
//     echo "\n";
//     echo $number;
//     echo "\n\n";
//     return $number + 20 + $carry;
// },0);
// print_r($reduced_array);
// var_dump($reduced_array);


// Array Slicing

// $sliced_array = array_slice($array, 2, 6);
// $sliced_array = array_splice($array, 2, 6,['A','B']);
// print_r($sliced_array);
// print_r($array);
