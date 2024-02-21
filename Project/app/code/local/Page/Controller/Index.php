<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('header.css')
            ->addCss('footer.css');

        $banner = $layout->createBlock('core/template')
            ->setTemplate('banner/banner.phtml');
        $layout->getChild('content')
            ->addChild('banner', $banner);

        $layout->toHtml();
    }
}