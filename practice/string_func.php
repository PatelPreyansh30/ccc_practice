<?php
$x = "Hello World";
$upper_case_string = "HELLO WORLD";
$lower_case_string = "hello world";
$html_string = "This is some <b>bold</b> text";
$a_tag_string = '<a href="https://www.google.com">Go to Google.com</a>';

// echo strlen($x);

// echo str_replace("Hello","Hyy",$x);

// echo strpos($x,"r");

// echo substr($x,4,5);

// echo strtoupper($lower_case_string);

// echo strtolower($upper_case_string);

// echo trim("   Hello world     ");

// echo implode("",['H','e','l','l','o',' ','W','o','r','l','d'])

// print_r(explode(" ","Hello World"));

// echo htmlspecialchars($html_string);

// echo htmlentities($a_tag_string);

// echo nl2br("Hello world1\nHello world2");

// echo str_repeat("Hello world\n",2);

// echo strrev($x);

// echo str_shuffle($x);

// print_r(str_split($x,3));

// echo str_word_count($x);
// echo str_word_count($html_string);

// echo substr_replace($x,"Byy",0,5);

// echo str_pad($x,20,'.');


// What is binary safe string comparison?
// echo strcmp($x,"Hello World");
// echo strcmp($x,"Hello World234");
// echo strcmp($x,"Hello");


// What is locale based string comparison?
// echo strcoll($x,"Hello World");
// echo strcoll($x,"Hello World234");
// echo strcoll($x,"Hello");


// echo strcspn($x,"r");


// echo stristr($x,"world");
// echo stristr("Hello world hello! hello world", "WORLD");


// echo strpbrk($x,"r");


echo strstr($x, "Wo");
