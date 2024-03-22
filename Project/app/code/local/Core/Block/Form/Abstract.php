<?php

class Core_Block_Form_Abstract
{
    protected $_attribute = [];
    protected $_extraParameters = [];
    public function setAttribute($attribute)
    {
        $this->_attribute = $attribute;
        return $this;
    }
    public function setParameters($parameters)
    {
        $this->_extraParameters = $parameters;
        return $this;
    }
    public function getAttribute()
    {
        return $this->_attribute;
    }
    public function getParameters($key = null)
    {
        if (isset ($this->_extraParameters[$key])) {
            return $this->_extraParameters[$key];
        }
        return $this->_extraParameters;
    }
    public function getLabel()
    {
        if (isset ($this->_attribute['label'])) {
            return $this->_attribute['label'];
        }
    }
    public function getId()
    {
        if (isset ($this->_attribute['id'])) {
            return $this->_attribute['id'];
        }
    }
    public function getName()
    {
        if (isset ($this->_attribute['name'])) {
            return $this->_attribute['name'];
        }
    }
}