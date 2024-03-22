<?php

class Core_Block_Form_Option extends Core_Block_Form_Abstract
{
    public function toHtml()
    {
        $option = "<option";
        foreach ($this->getAttribute() as $key => $value) {
            $option .= " {$key}={$value} ";
        }
        $option .= ">{$this->getLabel()}</option>";
        return $option;
    }
}
