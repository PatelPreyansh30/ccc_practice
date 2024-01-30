<?php

echo "<pre>";

// class Fruit
// {
//     public $name;
// public $color;
//     protected $color;
//     private $weigth;

//     function __construct($name, $color, $weigth)
//     {
//         $this->name = $name;
//         $this->color = $color;
//         $this->weigth = $weigth;
//     }

// function __destruct()
// {
//     echo "The fruit is {$this->name} and the color is {$this->color}";
// }

// function set_name($name, $color)
// {
//     $this->name = $name;
//     $this->color = $color;
// }

// function get_name()
// {
//     return $this->name;
// }
// }

// $mango = new Fruit("Mango", "Yellow", 8);
// print_r($mango);

// var_dump($mango->name); // NULL
// var_dump($mango->get_name()); // NULL

// $mango->set_name("Mango");
// echo $mango->name; // Mango
// echo $mango->get_name(); // Mango

// $mango->name = "Mango";
// echo $mango->name; // Mango
// echo $mango->color;
// echo $mango->weigth;

// class A
// {
//     public $i = 0;
//     public function inc()
//     {
//         $this->i++;
//     }
//     public function reset()
//     {
//         $this->i = 10;
//     }
// }

// $obj1 = new A();
// print_r($obj1);
// $obj1->inc();
// print_r($obj1);
// $obj1->reset();
// $obj1->i = 10;

// $obj2 = new A();
// $obj2->inc();

// print_r($obj1);
// $obj1->inc();
// print_r($obj2);

// class A
// {
// private $array = [];

// public function __set($name, $value)
// {
// // Run when access not accessible properties.
// $this->array[$name] = $value;
// }

// public function __get($name)
// {
//     // Run when access not accessible properties.
//     return $this->array[$name];
// }

// public function __call($name, $arguments)
// {
//     // Runs when methods that do not exist or are not accessible in the class
//     echo "Method: {$name}";
//     echo "<br>";
//     echo "Arguments: " . implode(', ', $arguments);
//     echo "<br>";
// }

// public function __toString()
// {
//     // How an object of the class should be represented as a string
//     return "This is string representation of class";
// }

// public function __unset($name)
// {
//     // Unset an inaccessible or non-existent property of an object
//     unset($this->array[$name]);
// }

// public function __isset($name)
// {
//     // Check if an inaccessible or non-existent property of an object is set
//     return isset($this->array[$name]);
// }

// public static function __callStatic($name, $arguments)
// {
//     // Runs when methods that do not exist or are not accessible in the class
//     echo "Method: {$name}";
//     echo "<br>";
//     echo "Arguments: " . implode(', ', $arguments);
//     echo "<br>";
// }

// public function __serialize(): array
// {
//     return $this->array;
// }
// }

// $obj = new A();
// print_r($obj);

// echo $obj;

// var_dump(isset($obj->name));

// $obj->name = "XYZ";

// $obj->name("xyz");
// A::name("xyz");

// print_r($obj);

// $obj->myFunction('arg 1', 'arg 2');

// var_dump(isset($obj->name));

// unset($obj->name);
// print_r($obj);

class A
{
    public $a = 3;
    protected $b = 4;
    private $c = 5;

    public function accessProtected()
    {
        return $this->b;
    }

    public function accessPrivate()
    {
        return $this->c;
    }
}

// class B
class B extends A
{
    public function accessProtectedFromChild()
    {
        return $this->b;
    }

    // public function accessPrivateFromChild()
    // {
    //     return $this->c;
    // }
}

$obj1 = new A();

$obj2 = new B();
// print_r($obj2->accessProtectedFromChild());
// print_r($obj2);

// echo $obj1->a; // 3
// echo $obj1->b; // can't access
// echo $obj1->c; // can't access
// echo $obj1->accessProtected(); // 4
// echo $obj1->accessPrivate(); // 5

// echo $obj2->a; // 3
// echo $obj2->b; // can't access
// echo $obj2->c; // can't access
// echo $obj2->accessProtectedFromChild(); // 4
// echo $obj2->accessPrivateFromChild(); // can't access