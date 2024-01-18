<?php

$text = "Hello, World! How are you doing?";

// 1. Find the length of the string.
echo strlen($text);
// 32

// 2. Convert the entire string to lowercase.
echo strtolower($text);
// hello, world! how are you doing?

// 3. Convert the entire string to uppercase.
echo strtoupper($text);
// HELLO, WORLD! HOW ARE YOU DOING?

// 4. Replace "How are you doing?" with "Fine, thank you!".
echo str_replace("How are you doing?", "Fine, thank you!",$text);
// Hello, World! Fine, thank you!

// 5. Extract and print the first 10 characters of the string.
$output1 = substr($text,0,10);
echo $output1;
// Hello, Wor

// 6. Extract and print the substring starting from the 8th character to the end.
$output2 = substr($text,8);
echo $output2;
// orld! How are you doing?