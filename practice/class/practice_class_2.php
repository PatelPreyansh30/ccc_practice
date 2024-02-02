<pre>
<?php
class Data_Collection_Object
{
    protected $_data = [];
    public function addData($row)
    {
        $this->_data[] = new Data_Object($row);
    }

    public function getData()
    {
        return $this->_data;
    }
}
class Data_Object
{
    protected $_row = [];
    public function __construct($row)
    {
        $this->_row = $row;
        // print_r($this->_row);
        // echo "<br>";
    }
    public function __call($name, $args)
    {
        $name = strtolower(substr($name, 3)); // (sku, name) 
        return isset($this->_row[$name])
            ? $this->_row[$name]
            : strtolower($args[0]);
    }
}
$newObj = new Data_Collection_Object();
$temp = [
    ['id' => 2, 'name' => 'nanme 2', 'sku' => 12],
    ['id' => 4, 'name' => 'nanme 8', 'sku' => 15],
    ['id' => 5, 'name' => 'nanme 0'],
];
foreach ($temp as $_temp) {
    $newObj->addData($_temp);
}
foreach ($newObj->getData() as $_mmdata) {
    echo "<br>";
    print_r($_mmdata->getSku('Simple'));
    echo "<br>";
    print_r($_mmdata->getName());
}
