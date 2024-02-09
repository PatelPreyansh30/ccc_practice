<?php

class Core_Controller_Front
{
    public function init()
    {
        $coreRequestModel = Mage::getModel('core/request');

        // $moduleName = $coreRequestModel->getModuleName();
        // $controllerName = $coreRequestModel->getControllerName();
        $actionName = $coreRequestModel->getActionName() . "Action";

        $frontControllerClass = $coreRequestModel->getFullControllerClass();
        $frontControllerObj = new $frontControllerClass();
        $frontControllerObj->$actionName();
    }
}