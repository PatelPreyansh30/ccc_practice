<?php
$x = "Hello World";
$upper_case_string = "HELLO WORLD";
$lower_case_string = "hello world";
$html_string = "This is some <b>bold</b> text";
$a_tag_string = '<a href="https://www.google.com">Go to Google.com</a>';

// echo strlen($x);
// echo strlen("    @#45    ");

// echo str_replace("l","b",$x);

// echo strpos($x,"r");

// echo substr($x,4,5);
// echo substr($x,-3,4);

// echo strtoupper($lower_case_string);

// echo strtolower($upper_case_string);

// echo trim("   Hello world     ");

// echo implode("",['H','e','l','l','o',' ','W','o','r','l','d'])

// print_r(explode(" ","Hello World"));

// echo $html_string;
// echo htmlspecialchars($html_string);
// htmlspecialchars() and our improved modification p() and s() are used in forms and displaying of nonhtml text.

// echo $a_tag_string;
// echo htmlentities($a_tag_string);
// htmlentities() is used to convert given text into ASCII encoding;

// Insert html line break
// echo nl2br("Hello world1\nHello world2");

// echo str_repeat("Hello world\n",2);

// echo strrev($x);

// echo str_shuffle($x);

// print_r(str_split($x,3));

// echo str_word_count($x);
// print_r(str_word_count($html_string,0));
// print_r(str_word_count($html_string,1));
// print_r(str_word_count($html_string,2));

// echo substr_replace($x,"Byy",0,7);

// echo str_pad($x,20,'.');

// What is binary safe string comparison?
// echo strcmp($x,"Hello World");
// echo strcmp($x,"Hello world");
// echo strcmp($x,"Hello World234");
// echo strcmp($x,"Hello");
// echo strcmp("50000000000000","0");

// What is locale based string comparison?
// echo strcoll($x,"Hello World");
// echo strcoll($x,"Hello World234");
// echo strcoll($x,"Hello");

// echo strcspn($x,"W",0,10);

// echo stristr($x,"world");
// echo stristr("Hello world hello! hello world", "WORLD");
// echo stristr("Hello world hello! hello world", "ll");
// echo stristr("Hello world hello! hello world", "lw");

// echo strpbrk($x,"ll");
// echo strpbrk($x,"ab");

// echo strstr($x, "ll");
// echo strstr($x, "ll", true);

// echo strtr($x, 'l','.');
// echo strtr($x, 'Hello', 'Hi');
// echo strtr($x, ['Hello' => 'Hi']);

// echo ucfirst("abcd");

// echo ucwords("abcd xyz mnop 123 @34");
