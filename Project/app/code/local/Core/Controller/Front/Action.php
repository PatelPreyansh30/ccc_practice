<?php

class Core_Controller_Front_Action
{
    protected $_layout = null;
    protected $_allowedAction = [];
    public function __construct()
    {
        $this->init();
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('main.css')
            ->addCss('header.css')
            ->addCss('footer.css');
    }
    public function init()
    {
        $actionName = $this->getRequest()->getActionName();
        $customerId = Mage::getSingleton('core/session')->get('logged_in_customer_id');

        if (
            !in_array($actionName, $this->_allowedAction) && !$customerId
        ) {
            $this->setRedirect('customer/account/login');
        }
        return $this;
    }
    public function getLayout()
    {
        if (is_null($this->_layout)) {
            $this->_layout = Mage::getBlock('core/layout');
        }
        return $this->_layout;
    }
    public function getRequest()
    {
        return Mage::getModel("core/request");
    }
    public function setRedirect($url)
    {
        $url = Mage::getBaseUrl($url);
        header("Location: {$url}");
    }
    public function checkDataIsNull(array $data, string $url)
    {
        foreach ($data as $value) {
            if (!$value || empty ($value)) {
                $this->setRedirect($url);
            }
        }
    }
}