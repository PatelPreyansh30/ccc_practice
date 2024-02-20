<?php

class Catalog_Controller_Category extends Core_Controller_Front_Action
{
    public function newAction()
    {
        $layout = $this->getLayout();
        // $layout->getChild('head')->addJs('abc.js');
        $child = $layout->getChild('content');

        $categoryForm = $layout->createBlock('catalog/admin_category');
        $child->addChild('form', $categoryForm);
        echo $layout->toHtml();
    }
}