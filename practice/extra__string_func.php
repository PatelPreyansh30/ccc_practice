<?php
$x = "Hello World";

// echo chop($x, "rld");
// echo chop("    .hello world.    ", "");

// Return character from ASCII value
// echo chr(52);
// echo chr(052);
// echo chr(0x52);

// echo chunk_split($x,1,"/");
// echo chunk_split($x,5,"/");

// echo crypt($x, "CRYPT_SHA_256");

// Alias of implode
// echo join(".", ['H', 'e', 'l', 'l', 'o', ' ', 'W', 'o', 'r', 'l', 'd']);

// Convert firstletter to lower case
// echo lcfirst($x);

// Return ASCII value of character
// echo ord($x);
// echo ord("A");

// echo number_format("1000000",3);
// echo number_format("1000000",3,"#","%");

// $variable_array = [];
// parse_str("variable1=abc&variable2=xyz", $variable_array);
// print_r($variable_array);

// Convert string to sha-1 hash
// echo sha1($x);

// echo similar_text("Hello world","HelO india");

// Alias of strstr
// echo strchr($x,"ll");

// strnatcmp compare two string with case sensitive and strnatcasecmp compare without case sensitive
// echo strnatcmp("2Hello world!", "10Hello world!");
// echo strnatcmp("10Hello world!", "2Hello world!");

// strncmp compare two string with case sensitive and strncasecmp compare without case sensitive
// echo strncmp("2Hello world!", "10Hello world!",5);
// echo strncmp("10Hello world!", "2Hello world!",5);

// echo strripos($x,"R");
// echo strripos($x,"a");

// echo strrpos($x,"r");
// echo strrpos($x,"R");

// echo wordwrap($x,6,"<hr>");
// output: <body>Hello<hr>World</body>

$array = ['a','b','c','d'];
echo var_dump($array);