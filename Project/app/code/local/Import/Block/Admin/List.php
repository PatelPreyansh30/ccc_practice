<?php

class Import_Block_Admin_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('import/admin/list.phtml');
    }
    public function getFileList()
    {
        return array_diff(scandir(Mage::getBaseDir('media/import')), ['.', '..']);
    }
}