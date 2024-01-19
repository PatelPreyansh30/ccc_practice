<?php

// Arithmetic Operator

// echo 15+20;
// var_dump(15.35+20.65);

// echo 15-20;
// echo 20-5;
// echo 15.32-56.89;
// var_dump(54.69-36.58);

// echo 5*9;
// echo 5.1*0;
// echo 5.1*-2;
// var_dump(5.1*6.9);

// echo 10/2;
// echo 15/8;
// var_dump(10/2);
// var_dump(58/9);
// var_dump(58/9.6);
// var_dump(58/0); // Division by zero error

// echo 10%2;
// var_dump(10%2);
// echo 78%5;
// var_dump(78%5);
// can't give float to modulus operator

// echo 10**2;
// var_dump(10**2);
// echo 5**0;
// var_dump(5**0);
// echo 5**6.5;
// var_dump(5**6.5);


// Assignment operator

// $a = 37;
// $b = 5;
// $a = $b;
// $a += $b; // $a = $a + $b;
// $a -= $b; // $a = $a - $b;
// $a *= $b; // $a = $a * $b;
// $a /= $b; // $a = $a / $b;
// $a %= $b; // $a = $a % $b;
// $a **= $b; // $a = $a ** $b;
// echo $a;
// echo $b;


// Comparison Operators

// $result = 12 < 15;
// $result = 12.45 < 15.56;
// $result = "hello" < "hello";
// $result = "Hello" < "hello";
// $result = true < false;
// $result = true < null;
// $result = false < null;

// $result = 12 > 15;
// $result = 12.45 > 15.56;
// $result = "hello" > "hello";
// $result = "hello world" > "hello";
// $result = true > false;
// $result = true > null;
// $result = false > null;

// $result = 12 >= 15;
// $result = 12.45 >= 15.56;
// $result = "hello" >= "hello";
// $result = "hello " >= "hello";
// $result = true >= false;
// $result = true >= null;
// $result = false >= null;

// $result = 12 == 12;
// $result = 12 == "12";
// $result = 12.45 == 12.58;
// $result = "hello12" == "hello";
// $result = "Hello" == "hello";
// $result = true == false;
// $result = true == "true";
// $result = true == null;
// $result = false == null;

// $result = 12 === 12;
// $result = 12 === "12";
// $result = 12.45 === 12.45;
// $result = "hello123" === "hello";
// $result = "hello" === "hello";
// $result = true === false;
// $result = true === "true";
// $result = true === null;
// $result = false === null;

// $result = 12 != 15;
// $result = 12 != "17";
// $result = 12.45 != 12.45;
// $result = "hello12" != "hello";
// $result = "Hello" != "hello";
// $result = true != false;
// $result = true != "true";
// $result = true != null;
// $result = false != null;

// $result = 12 !== 12;
// $result = 12 !== "12";
// $result = 12.45 !== 12.45;
// $result = "hello123" !== "hello";
// $result = "hello" !== "hello";
// $result = true !== false;
// $result = true !== "true";
// $result = true !== null;
// $result = false !== null;

// echo $result;
// var_dump($result);


// Logical operator

// $result = true && true;
// $result = true && false;
// $result = 15 && 0;
// $result = "A" && "";

// $result = true || true;
// $result = true || false;
// $result = 15 || 0;
// $result = "A" || "K";
// $result = false || false;

// $result = !$result;

// echo $result;
// var_dump($result);


// Increment / Decrement Operator
/* 
++$x -> Pre-increment -> First increment then return
$x++ -> Post-increment -> First return then increment
--$x -> Pre-decrement -> First decrement then return
$x-- -> Post-decrement -> First return then decrement
*/

// $a = 10;
// echo $a; // 10
// echo ++$a; // 11
// echo $a; // 11

// $b = 10;
// echo $b; // 10
// echo $b++; // 10
// echo $b; // 11

// $c = 10;
// echo $c; // 10
// echo --$c; // 9
// echo $c; // 9

// $d = 10;
// echo $d; // 10
// echo $d--; // 10
// echo $d; // 9


// String operator
// $a = "Hello";
// $b = "World";

// echo $a.$b; // HelloWorld

// echo "$a\n$b\n"; 
// $a .= $b;
// echo $a; // HelloWorld


// Conditional(Ternary) operator
/* 
(expression ? statement1 : statement2 )
--> if exp. true then return statement1 otherwise statement2 
*/

// $result = true ? "This condition is true" : "This condition is false";
// $result = false ? "This condition is true" : "This condition is false";
// $result = 1 ? "This condition is true" : "This condition is false";
// $result = 0 ? "This condition is true" : "This condition is false";
// $result = "" ? "This condition is true" : "This condition is false";
// $result = "Something" ? "This condition is true" : "This condition is false";
// $result = null ? "This condition is true" : "This condition is false";
// $result = 10.25 ? "This condition is true" : "This condition is false";
// var_dump($result);
