<?php

include('mysql_function.php');

echo "<pre>";

function getKeysFromPostRequest()
{
    $keys = [];
    foreach ($_POST as $key => $val) {
        if (is_array($val)) {
            $keys[] = $key;
        };
    };
    return $keys;
};

function getPostData(string $key)
{
    return $_POST[$key];
};

function getGetData(string $key)
{
    return $_GET[$key];
};

if (getPostData('submit')) {
    $keys = getKeysFromPostRequest();

    for ($i = 0; $i < count($keys); $i++) {
        $insert_query = insert($keys[$i], getPostData($keys[$i]));
    };
};



// $update_query = update($tablename,);