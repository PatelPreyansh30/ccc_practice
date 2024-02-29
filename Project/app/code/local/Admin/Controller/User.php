<?php

class Admin_Controller_User extends Core_Controller_Admin_Action
{
    protected $_allowedAction = ['login'];
    public function loginAction()
    {
        if ($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getParams('email');
            $password = $this->getRequest()->getParams('password');
            $EMAIL = 'admin@gmail.com';
            $PAASWORD = 'admin';

            if ($EMAIL == $email && $PAASWORD == $password) {
                Mage::getSingleton('core/session')
                    ->set('logged_in_admin_user_id', 1);
                $this->setRedirect('admin/catalog_product/list');
            } else {
                $this->setRedirect('admin/user/login');
            }
        } else {
            $layout = $this->getLayout();
            $layout->getChild('head')
                ->addCss('admin/user/form.css');
            $layout->removeChild('header')
                ->removeChild('footer');

            $content = $layout->getChild("content");

            $loginForm = Mage::getBlock('admin/user');
            $content->addChild('form', $loginForm);

            $layout->toHtml();
        }
    }
}