<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/account/form.css')
            ->addJs('');
        $layout->removeChild('header')
            ->removeChild('footer');

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
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('customer');

            $data = Mage::getModel('customer/account')
                ->getCollection()
                ->addFieldToFilter('customer_email', $data['customer_email'])
                ->addFieldToFilter('password', $data['password']);

            $count = 0;
            $customerId = 0;

            foreach ($data->getData() as $_data) {
                $count++;
                $customerId = $_data->getId();
            }

            if ($count) {
                Mage::getSingleton('core/session')
                    ->set('logged_in_customer_id', $customerId);
            }
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('customer/account/form.css')
                ->addJs('');
            $layout->removeChild('header')
                ->removeChild('footer');

            $content = $layout->getChild("content");

            $loginForm = Mage::getBlock('customer/account_login');
            $content->addChild('form', $loginForm);

            $layout->toHtml();
        }
    }
    public function dashboardAction()
    {
        $customerId = Mage::getSingleton('core/session')
            ->get('logged_in_customer_id');

        if ($customerId) {
            $data = Mage::getModel('customer/account')
                ->load($customerId);
            // echo get_class($data);
            print_r($data);
        } else {
            echo "You are not allowed to view this page";
        }
    }
    public function forgotpasswordAction()
    {
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getParams('customer');

            $data = Mage::getModel('customer/account')
                ->getCollection()
                ->addFieldToFilter('customer_email', $data['customer_email']);

            print_r($data->getData());
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('customer/account/form.css')
                ->addJs('');

            $content = $layout->getChild("content");

            $forgotpasswordForm = Mage::getBlock('customer/account_forgotpassword');
            $content->addChild('form', $forgotpasswordForm);

            $layout->toHtml();
        }
    }
}