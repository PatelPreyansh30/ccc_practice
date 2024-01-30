<pre>
<?php
// phpinfo();
class A
{
    public $a = 10;
    public function test()
    {
        $this->a++;
        return $this;
    }
    public function test2()
    {
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
        echo get_class($this);
        echo get_class($this->obj);
        $this->a = $this->obj->a;
        return $this;
    }
}

$obj = new B();

$obj->test2();
die;
print_r($obj->a);
$obj->test2();
print_r($obj->a);
// print_r($obj->test2());

// $obj2 = new B();
// print_r($obj2->a);
?>