<?php

class Core_Block_Form_Text extends Core_Block_Form_Abstract
{
    public function toHtml()
    {
        if ($this->getLabel() && $this->getId()) {
            $input = '<label for="' . $this->getId() . '">' . $this->getLabel() . '</label>';
        }
        $input .= '<input type="text"';
        foreach ($this->getAttribute() as $key => $value) {
            $input .= ' ' . $key . '="' . $value . '"';
        }
        $input .= '>';
        return $input;
    }
}
