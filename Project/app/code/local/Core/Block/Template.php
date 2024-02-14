<?php

class Core_Block_Template extends Core_Block_Abstract
{
    protected $_child = [];
    public function toHtml()
    {
        return $this->render();
    }
    public function addChild($key, $value)
    {
        $this->_child[$key] = $value;
    }
    public function removeChild($key)
    {
    }
    public function getChild($key)
    {
        return $this->_child[$key];
    }
    public function getChildHtml($key)
    {
        $this->getChild($key)->toHtml();
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
}