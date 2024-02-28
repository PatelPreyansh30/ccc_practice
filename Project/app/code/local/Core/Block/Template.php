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
        return $this;
    }
    public function removeChild($key)
    {
        if (isset($this->_child[$key])) {
            unset($this->_child[$key]);
        }
        return $this;
    }
    public function getChild($key)
    {
        return $this->_child[$key];
    }
    public function getChildHtml($key)
    {
        $html = '';
        if ($key == '' && count($this->_child)) {
            foreach ($this->_child as $_child) {
                $html .= $_child->toHtml();
            }
        } else {
            $html = isset($this->_child[$key]) ? $this->getChild($key)->toHtml() : '';
        }
        return $html;
    }
    public function getRequest()
    {
        return Mage::getModel('core/request');
    }
}