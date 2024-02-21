<?php

class Admin_Controller_Catalog_Category extends Core_Controller_Front_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css')
            ->addCss('category.css');
        $child = $layout->getChild('content');

        $categoryForm = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $categoryForm);
        echo $layout->toHtml();
    }
}