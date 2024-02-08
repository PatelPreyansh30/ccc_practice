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

    th {
        background-color: #04AA6D;
        color: white;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
    }

    tr:hover {
        background-color: gainsboro;
    }

    .link {
        display: inline-block;
        margin: 10px 10px 0 0;
        padding: 10px;
        color: white;
        background-color: coral;
        border-radius: 10px;
        text-decoration: none;
    }
</style>

<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace("_", "/", $class_name);
    include_once $class_name . '.php';
});