<?php

class Core_Block_Form_Select extends Core_Block_Form_Abstract
{
    public function toHtml()
    {
        $input = '';
        if ($this->getLabel() && $this->getId()) {
            $input .= '<label for="' . $this->getId() . '">' . $this->getLabel() . '</label>';
        }
        $input .= '<select';
        foreach ($this->getAttribute() as $key => $value) {
            $input .= ' ' . $key . '="' . $value . '"';
        }
        $input .= '>';
        foreach ($this->getParameters('option') as $value) {
            $input .= $value;
        }
        $input .= '</select>';
        return $input;
    }
}
