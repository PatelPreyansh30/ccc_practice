<?php

$sentence = "The quick brown fox jumps over the lazy dog";

// 1. Find the position of the word "fox" in the sentence.
echo strpos($sentence,"fox");
// 16

// 2. Check if the word "cat" is present in the sentence.
$output1 = stristr($sentence,"cat");
// echo $output1;
echo var_dump($output1);
// false

// 3. Extract and print the first 20 characters of the sentence.
$output2 = substr($sentence,0,20);
echo $output2;
// The quick brown fox