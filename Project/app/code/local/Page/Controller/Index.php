<?php

class Page_Controller_Index extends Core_Controller_Front_Action
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')->addJs('js/abc.js');
        $layout->getChild('head')->addJs('js/page.js');
        $layout->getChild('head')->addCss('css/abc.css');
        $layout->getChild('head')->addCss('css/page.css');
        echo $layout->toHtml();
    }
}