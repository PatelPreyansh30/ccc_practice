<?php

class Import_Model_Import extends Core_Model_Abstract
{
    public function init()
    {
        $this->_resourceClass = 'Import_Model_Resource_Import';
        $this->_collectionClass = 'Import_Model_Resource_Collection_Import';
    }
}