<?php

$name = "John";

// 1. Pad the string with underscores (`_`) on the left side to make its total length 10 characters.
$output1 = str_pad($name,10,"_", STR_PAD_LEFT);
// echo ($output1);
// echo strlen($output1);
// ______John

// 2. Pad the string with asterisks (`*`) on the right side to make its total length 8 characters.
$output2 = str_pad($name,8,"*", STR_PAD_RIGHT);
// echo ($output2);
// echo strlen($output2);
// John****

// 3. Print the resulting strings.
echo "$output1\n$output2";