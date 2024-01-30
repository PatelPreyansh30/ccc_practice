<?php

class File
{
    public $filename, $fileSize;
    private $fileExtention;

    public function getFileExtension()
    {
        $parts = explode(".", $this->filename);
        $this->fileExtention = end($parts);
        return $this->fileExtention;
    }

    public function displayFileInfo()
    {
        echo "File Name: {$this->filename} <br> File Size: {$this->fileSize} <br> File Extention: {$this->fileExtention} <br><br>";
    }
}

$file = new File();
$file->filename = "document.txt";
$file->fileSize = "100kb";

$file->displayFileInfo();
$file->getFileExtension();
$file->displayFileInfo();
