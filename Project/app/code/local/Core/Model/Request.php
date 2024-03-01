<?php

class Core_Model_Request
{
    protected $_controllerName, $_moduleName, $_actionName;

    public function __construct()
    {
        $requestUri = $this->getRequestUri();
        $requestUri = array_filter(explode("/", $requestUri));
        $this->_moduleName = isset($requestUri[0]) ? $requestUri[0] : "page";
        $this->_controllerName = isset($requestUri[1]) ? $requestUri[1] : "index";
        $this->_actionName = isset($requestUri[2]) ? $requestUri[2] : "index";
    }

    public function getFullControllerClass()
    {
        $controllerClass = ucwords(implode('_', [$this->_moduleName, 'Controller', $this->_controllerName]), "_");
        return $controllerClass;
    }
    public function getModuleName()
    {
        return $this->_moduleName;
    }

    public function getControllerName()
    {
        return $this->_controllerName;
    }
    public function getActionName()
    {
        return $this->_actionName;
    }

    public function getRequestUri()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = str_replace('/php/Project/', '', $requestUri);
        if (strpos($requestUri, '?') !== false)
            $requestUri = stristr($requestUri, '?', true);
        return $requestUri;
    }

    public function getParams($key = '', $arg = null)
    {
        return($key == '')
            ? $_REQUEST
            : (isset($_REQUEST[$key])
                ? $_REQUEST[$key]
                : ((!is_null($arg)) ? $arg : '')
            );
    }

    public function getPostData(string $key = '')
    {
        return $key == '' ? $_POST : (isset($_POST[$key]) ? $_POST[$key] : '');
    }

    public function getFileData(string $key = '')
    {
        return $key == '' ? $_FILES : (isset($_FILES[$key]) ? $_FILES[$key] : '');
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