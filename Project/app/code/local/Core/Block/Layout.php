<?php

class Core_Block_Layout extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate("page/demo.phtml");
    }
    public function prepareChildren()
    {
    }
    public function createBlock($className)
    {
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
}