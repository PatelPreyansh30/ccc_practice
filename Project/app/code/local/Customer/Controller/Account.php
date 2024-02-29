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
        $customerData = $this->getRequest()->getParams('customer');
        // echo ($customerData['customer_email']);
        // die;

        $customerModel = Mage::getModel('customer/customer');
        $customerCollection = $customerModel->getCollection();

        $existingCustomer = $customerCollection->addFieldToFilter('customer_email', $customerData['customer_email'])->getData();

        $address = Mage::getBaseUrl('customer/account');
        if (count($existingCustomer)) {
            echo "<script>
                alert('Email already exits');
                location. href='{$address}/register';
            </script>";
        } else {
            $customerModel->setData($customerData)->save();
            echo "<script>
                alert('Customer register successfully');
                location. href='{$address}/login';
            </script>";
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

            $address = Mage::getBaseUrl('customer/account');
            if (count($loginData)) {
                Mage::getSingleton('core/session')
                    ->set('logged_in_customer_id', $loginData[0]->getId());
                echo "<script>
                    alert('Login Successfully');
                    location. href='{$address}/dashboard';
                </script>";
            } else {
                echo "<script>
                    alert('Invalid credentials');
                    location. href='{$address}/login';
                </script>";
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

        $address = Mage::getBaseUrl('customer/account');
        if ($customerId) {
            $customerData = Mage::getModel('customer/customer')
                ->load($customerId);
            print_r($customerData);
        } else {
            echo "<script>
                    location. href='{$address}/login';
                </script>";
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
                ->addCss('customer/account/form.css')
                ->addJs('');
            $layout->removeChild('header')
                ->removeChild('footer');

            $content = $layout->getChild("content");

            $forgotpasswordForm = Mage::getBlock('customer/account_forgotpassword');
            $content->addChild('form', $forgotpasswordForm);

            $layout->toHtml();
        }
    }
}