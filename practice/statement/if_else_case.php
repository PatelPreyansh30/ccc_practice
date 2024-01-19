<?php

$result = true;
$result = false;
$result = 1;
$result = 0;
$result = "";
$result = "Something";
$result = null;
$result = 10.25;

// if ($result) {
//     echo "Your are in IF block";
// } else {
//     echo "Your are in ELSE block";
// };

$result = 'Red';
// $result = 'Green';
// $result = 'Blue';

// if ($result == 'Red'){
//     echo "Your are in IF block";
// } 
// elseif ($result == 'Green'){
//     echo "Your are in ELSE IF block";
// }
// else {
//     echo "Your are in ELSE block";
// };

$result2 = true;
$result2 = false;

if ($result == 'Red') {
    if ($result2) {
        echo "Your are in NESTED IF block";
    } else {
        echo "Your are in NESTED ELSE block";
    };
} else {
    echo "Your are in ELSE block";
};
