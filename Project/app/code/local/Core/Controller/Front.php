<?php

class Core_Controller_Front
{
    public function init()
    {
        $coreRequestModel = new Core_Model_Request();

        $moduleName = $coreRequestModel->getModuleName();
        $controllerName = $coreRequestModel->getControllerName();
        $actionName = $coreRequestModel->getActionName();
        $actionName .= "Action";

        $frontControllerClass = $coreRequestModel->getFullControllerClass();
        $frontControllerObj = new $frontControllerClass();
        // echo get_class($frontControllerObj);
        $frontControllerObj->$actionName();
    }
}