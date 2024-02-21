<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $child = $layout->getChild('content');

        $categoryForm = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $categoryForm);
        echo $layout->toHtml();
    }
}