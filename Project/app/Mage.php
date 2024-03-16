<?php

class Mage
{
    protected static $_baseDir = 'C:/xampp/htdocs/php/Project';
    protected static $_baseUrl = 'http://localhost/php/Project';
    private static $_singleton = [];

    public static function init()
    {
        $frontContoller = new Core_Controller_Front();
        $frontContoller->init();
    }

    public static function getModel($className)
    {
        $className = str_replace('/', '_Model_', $className);
        $className = ucwords($className, '_');
        return new $className();
    }

    public static function getBlock($className)
    {
        $className = str_replace('/', '_Block_', $className);
        $className = ucwords($className, '_');
        return new $className();
    }

    public static function getSingleton($className)
    {
        if (isset (self::$_singleton[$className])) {
            return self::$_singleton[$className];
        } else {
            return self::$_singleton[$className] = self::getModel($className);
        }
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if (is_null($subDir)) {
            return self::$_baseDir;
        }
        return self::$_baseDir . '/' . $subDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if (is_null($subUrl)) {
            return self::$_baseUrl;
        }
        return self::$_baseUrl . '/' . $subUrl;
    }

}