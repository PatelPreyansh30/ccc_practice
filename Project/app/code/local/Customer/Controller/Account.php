<?php

class Customer_Controller_Account extends Core_Controller_Front_Action
{
    protected $_allowedAction = ['register', 'login'];
    public function registerAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('customer/account/form.css');
        $layout->removeChild('header')
            ->removeChild('footer');

        $content = $layout->getChild("content");

        $registerForm = Mage::getBlock('customer/account_register');
        $content->addChild('form', $registerForm);

        $layout->toHtml();
    }
    public function saveAction()
    {
        $customerData = $this->getRequest()->getParams('customer');

        $customerModel = Mage::getModel('customer/customer');
        $customerCollection = $customerModel->getCollection();

        $existingCustomer = $customerCollection->addFieldToFilter('customer_email', $customerData['customer_email'])->getData();

        if (count($existingCustomer)) {
            $this->setRedirect('customer/account/register');
        } else {
            $customerModel->setData($customerData)->save();
            $this->setRedirect('customer/account/login');
        }
    }
    public function loginAction()
    {
        if ($this->getRequest()->isPost()) {
            $loginData = $this->getRequest()->getParams('customer');

            $loginData = Mage::getModel('customer/customer')
                ->getCollection()
                ->addFieldToFilter('customer_email', $loginData['customer_email'])
                ->addFieldToFilter('password', $loginData['password'])
                ->getData();

            if (count($loginData)) {
                Mage::getSingleton('core/session')
                    ->set('logged_in_customer_id', $loginData[0]->getId());
                $this->setRedirect('customer/account/dashboard');
            } else {
                $this->setRedirect('customer/account/login');
            }
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('customer/account/form.css');
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
            $customerData = Mage::getModel('customer/customer')
                ->load($customerId);

            $layout = $this->getLayout();
            $content = $layout->getChild("content");

            // $dashboard = Mage::getBlock('customer/account_dashboard');
            // $content->addChild('form', $dashboard);
            echo "<pre>";
            print_r($customerData);
            echo "</pre>";
            $layout->toHtml();
        }
    }
    public function forgotpasswordAction()
    {
        if ($this->getRequest()->isPost()) {
            $customerData = $this->getRequest()->getParams('customer');

            $customerData = Mage::getModel('customer/customer')
                ->getCollection()
                ->addFieldToFilter('customer_email', $customerData['customer_email'])
                ->getData();

            print_r($customerData);
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('customer/account/form.css');
            $layout->removeChild('header')
                ->removeChild('footer');

            $content = $layout->getChild("content");

            $forgotpasswordForm = Mage::getBlock('customer/account_forgotpassword');
            $content->addChild('form', $forgotpasswordForm);

            $layout->toHtml();
        }
    }
}