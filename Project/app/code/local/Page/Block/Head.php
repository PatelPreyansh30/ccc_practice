<?php

class Page_Block_Head extends Core_Block_Template
{
    protected $_js = [], $_css = [];
    public function __construct()
    {
        $this->setTemplate("page/head.phtml");
    }
    public function addJs($file)
    {
        $this->_js[] = $file;
        return $this;
    }
    public function addCss($file)
    {
        $this->_css[] = $file;
        return $this;
    }
    public function getJs()
    {
        return $this->_js;
    }
    public function getCss()
    {
        return $this->_css;
    }
    public function getCssUrl($file)
    {
        return Mage::getBaseUrl("skin/css/" . $file);
    }
    public function getJsUrl($file)
    {
        return Mage::getBaseUrl("skin/js/" . $file);
    }
    public function getLogoUrl()
    {
        return Mage::getBaseUrl("skin/images/logo.png");
    }
}