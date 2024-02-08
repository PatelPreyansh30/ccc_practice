<?php

class Controller_Front
{
    public function init()
    {
        $request_model = new Model_Request();
        $request_uri = $request_model->getRequestURI();
        $request_uri = str_replace('/php/practice/Practice/', '', $request_uri);
        $className = str_replace("/", "_", 'View/' . ucwords($request_uri, "/"));
        $layout = new $className();

        if ($request_model->isPost()) {
            print_r($request_model->getPostData());
        }

        return $layout->toHtml();
    }
}