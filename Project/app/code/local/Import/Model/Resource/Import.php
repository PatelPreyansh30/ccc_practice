<?php

class Import_Model_Resource_Import extends Core_Model_Resource_Abstract
{
    public function __construct()
    {
        $this->init('import_mediator', 'import_id');
    }
}