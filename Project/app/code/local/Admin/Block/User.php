<?php

class Admin_Block_User extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('admin/user/login.phtml');
    }
}