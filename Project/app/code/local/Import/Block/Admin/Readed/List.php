<?php

class Import_Block_Admin_Readed_List extends Core_Block_Template
{
    public function __construct()
    {
        $this->setTemplate('import/admin/readed/list.phtml');
    }
    public function getPendingImportList()
    {
        return Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('status', 0)
            ->addGroupBy('type')
            ->addCount('json', 'pending_import')
            ->getData();
    }
}