<style>
    div {
        margin-bottom: 10px;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    .link {
        display: block;
        margin-top: 10px;
    }
</style>

<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("_", "/", $class_name);
    if (file_exists($class_name . '.php')) {
        include_once $class_name . '.php';
    } else {
        include_once $class_name . '/index.php';
    }
});