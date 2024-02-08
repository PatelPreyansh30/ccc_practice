<?php

class Controller_Front
{
    public function init()
    {
        $request_model = new Model_Request();
        $requset_uri = $request_model->getRequestURI();
        $requset_uri = str_replace('/php/practice/Practice/', '', $requset_uri);
        $className = str_replace("/", "_", 'View/' . ucwords($requset_uri, "/"));
        $layout = new $className();
        echo $layout->toHtml();
    }
}