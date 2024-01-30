<?php
class Product
{
    private $productId;
    private $name;
    private $price;

    public function __construct($productId, $name, $price)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getProduct()
    {
        return "{$this->productId} - {$this->name} - {$this->price}<br>";
    }
}

class ShoppingCart
{
    private $items = [];

    public function addItem(Product $product)
    {
        $this->items[] = $product;
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function displayItems()
    {
        echo "Shopping Cart Items:<br>";
        foreach ($this->items as $item) {
            echo $item->getProduct();
        }
    }
}

$product1 = new Product(1, "Laptop", 800);
$product2 = new Product(2, "Smartphone", 400);
$product3 = new Product(3, "TV", 800);

$cart = new ShoppingCart();

$cart->addItem($product3);
$cart->addItem($product1);
$cart->addItem($product2);

$cart->displayItems();

echo "Total Price: " . $cart->calculateTotal() . " USD<br>";
