<?php

class Admin_Controller_Import extends Core_Controller_Admin_Action
{
    public function formAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('import/form.css')
            ->addJs('import/form.js');
        $child = $layout->getChild('content');

        $importForm = $layout->createBlock('import/admin_form');

        $child->addChild('form', $importForm);
        $layout->toHtml();
    }
    public function saveAction()
    {
        $csvFile = $this->getRequest()->getFileData('import_file');
        $pathToSave = Mage::getBaseDir('media/import/') . $csvFile['name'];

        if (file_exists($pathToSave)) {

            $pathInfo = pathinfo($pathToSave);
            $fileExtension = isset ($pathInfo['extension']) ? '.' . $pathInfo['extension'] : '';
            $counter = 1;
            while (file_exists($pathInfo['dirname'] . '/' . $pathInfo['filename'] . $counter . $fileExtension)) {
                $counter++;
            }
            $newFileName = $pathInfo['filename'] . $counter . $fileExtension;
            $pathToSave = $pathInfo['dirname'] . '/' . $newFileName;
        }
        move_uploaded_file($csvFile['tmp_name'], $pathToSave);

        $this->setRedirect('admin/import/list');
    }
    public function listAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('import/list.css');
        $child = $layout->getChild('content');

        $importList = $layout->createBlock('import/admin_list');

        $child->addChild('list', $importList);
        $layout->toHtml();
    }
    public function readAction()
    {
        $file = $this->getRequest()->getParams('file');
        $file = Mage::getBaseDir('media/import/') . $file;

        $file = fopen($file, 'r');
        $column = fgetcsv($file);
        while ($data = fgetcsv($file)) {
            $data = array_combine($column, $data);
            $data = json_encode($data);
            Mage::getModel('import/import')
                ->addData('json', $data)
                ->addData('type', 'product')
                ->save();
        }
        fclose($file);
        $this->setRedirect('admin/import/readedList');
    }
    public function readedListAction()
    {
        $layout = $this->getLayout();
        $layout->getChild('head')
            ->addCss('import/list.css')
            ->addJs('import/list.js');
        $child = $layout->getChild('content');

        $readedFileList = $layout->createBlock('import/admin_readed_list');

        $child->addChild('list', $readedFileList);
        $layout->toHtml();
    }
    public function importAction()
    {
        $type = $this->getRequest()->getParams('type');

        $importItem = Mage::getModel('import/import')
            ->getCollection()
            ->addFieldToFilter('type', $type)
            ->addFieldToFilter('status', 0)
            ->getFirstItem();

        $product = Mage::getModel('catalog/product')
            ->setData(json_decode($importItem->getJson(), true))
            ->save()
            ->getId();
        if ($product) {
            $importItem->addData('status', 1)->save();
            echo "true";
        } else {
            echo "false";
        }
    }
}