<?php

class Core_Model_Session
{
    public function __construct()
    {
        // if(is_null($_SESSION)){
        // if (is_null($_SESSION) || !isset($_SESSION)) {
        session_start();
        // }
    }
    public function getId()
    {
        if (!is_null($_SESSION)) {
            return session_id();
        }
        return false;
    }
    public function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return false;
    }
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }
    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    public function __destruct()
    {
    }
}