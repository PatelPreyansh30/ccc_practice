<?php

class Mage
{
    public static function init()
    {
        // $request_model = new Core_Model_Request();
        $requestModel = Mage::getModel('core/request');
        $requestUri = $requestModel->getRequestUri();

        // echo get_class($requestModel);
        echo $requestUri;
    }

    public static function getModel($className)
    {
        $className = str_replace('/', '_Model_', $className);
        $className = ucwords($className, '_');
        return new $className();
    }

    public static function getSingleton($className)
    {
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
    }

}