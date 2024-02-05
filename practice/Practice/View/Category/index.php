<?php
class View_Category
{
    public function __construct()
    {
    }
    private function renderForm()
    {
        $form = "<form action='' method='POST'>";
        $form .= $this->renderTextField("ccc_category[cat_name]", "Category Name: ");
        $form .= $this->renderSubmitButton();
        $form .= "<a href='?list=category' class='link'>View Category</a>";
        $form .= "<a href='?list=product' class='link'>View Product</a>";
        $form .= "<a href='?form=product' class='link'>Add Product</a>";
        return $form;
    }
    private function renderTextField($name, $label)
    {
        $textfield = "
        <div>
            <label for={$name}>{$label}</label>
            <input type='text' name={$name} id={$name}>
        </div>
        ";
        return $textfield;
    }
    private function renderSubmitButton()
    {
        $textfield = "
        <div>
            <input type='submit' name='submit' value='Submit' id='submit'>
        </div>
        ";
        return $textfield;
    }
    public function toHTML()
    {
        return $this->renderForm();
    }
}