<pre>
<?php
// phpinfo();
class A
{
    public $a = 10;
    public function test()
    {
        // echo "{$this->a} Printing<br>";
        echo "{$this->a} Before a++<br>";
        // $this->a++;
        // $this->a++;
        echo $this->a++;
        echo "<br>{$this->a} After a++<br>";
        print_r($this);
        echo "<br><br>";
        return $this;
    }
    public function test2()
    {
        echo "<br>Test2 of A class called<br>";
        if (!isset($this->obj)) {
            $this->obj = new A();
        }
        $this->obj->test()->test();
        $this->a = $this->obj->a;
        return $this;
    }
}
class B
{
    public function test2()
    {
        if (!isset($this->obj)) {
            $this->obj = new A();
        }
        $this->obj->test2()->test2();
        $this->obj->test();
        $this->a = $this->obj->a;
        return $this;
    }
}

$obj = new B();

$obj->test2();
print_r($obj->a);
echo " First Print<br><br>";
$obj->test2();
print_r($obj->a);
echo " Second Print<br><br>";
$obj->test2();
print_r($obj->a);
echo " 3rd Print<br><br>";
// print_r($obj->test2());

// $obj2 = new B();
// print_r($obj2->a);
?>