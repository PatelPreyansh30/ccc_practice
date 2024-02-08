<?php

spl_autoload_register(function ($class_name) {
    $class_name = str_replace("_", "/", $class_name);
    include_once $class_name . '.php';
});