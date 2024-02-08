<?php

class Core_Model_Request
{
    protected $_controllerName, $_moduleName, $_actionName;

    public function __construct()
    {
        $requestUri = $this->getRequestUri();
        $requestUri = explode("/", $requestUri);
        $this->_moduleName = $requestUri[0];
        $this->_controllerName = $requestUri[1];
        $this->_actionName = $requestUri[2];
    }

    public function getFullControllerClass()
    {
        $controllerClass = implode('_', [ucfirst($this->_moduleName), 'Controller', ucfirst($this->_controllerName)]);
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