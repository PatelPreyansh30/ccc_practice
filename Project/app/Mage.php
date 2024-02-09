<?php

class Mage
{
    protected static $_baseDir = 'C:/xampp/htdocs/php/Project';

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

}