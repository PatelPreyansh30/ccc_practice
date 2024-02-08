<?php

class Model_Request
{
    public function __construct()
    {
    }

    public function getRequestURI()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        return $requestUri;
    }
    public function getParams(string $key = '')
    {
        return $key == '' ? $_REQUEST : (isset($_REQUEST[$key]) ? $_REQUEST[$key] : '');
    }

    public function getPostData(string $key = '')
    {
        return $key == '' ? $_POST : (isset($_POST[$key]) ? $_POST[$key] : '');
    }

    public function getQueryData(string $key = '')
    {
        return $key == '' ? $_GET : (isset($_GET[$key]) ? $_GET[$key] : '');
    }

    public function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }
}