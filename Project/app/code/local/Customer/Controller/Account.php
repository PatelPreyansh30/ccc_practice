<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/account/form.css')
            ->addJs('');

        $content = $layout->getChild("content");

        $registerForm = Mage::getBlock('customer/account_register');
        $content->addChild('form', $registerForm);

        $layout->toHtml();
    }
    public function saveAction()
    {
        $data = $this->getRequest()->getParams('customer');

        Mage::getModel('customer/account')
            ->setData($data)
            ->save();
    }
    public function loginAction()
    {
        $layout = $this->getLayout();
        $content = $layout->getChild("content");

        $loginForm = Mage::getBlock('customer/account_login');
        $content->addChild('form', $loginForm);

        $layout->toHtml();
    }
    public function dashboardAction()
    {
    }
    public function forgotpasswordAction()
    {
    }
}