<?php

class Catalog_Block_Admin_Category extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('product/categoryForm.phtml');
    }
}