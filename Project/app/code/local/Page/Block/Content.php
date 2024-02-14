<?php

class Page_Block_Content extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('page/content.phtml');
    }
}