<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("_", "/", $class_name);
    if (file_exists($class_name . '.php')) {
        include_once $class_name . '.php';
    } else {
        include_once $class_name . '/index.php';
    }
    // View/Product.php
    // View/Product/index.php
    // View/Product/List.php
});