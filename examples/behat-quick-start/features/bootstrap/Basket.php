<?php

/**
 * Created by PhpStorm.
 * User: aming
 * Date: 2016/10/7
 * Time: 上午11:49
 */
class Basket implements \Countable
{
    private $shelf;
    private $products = array();
    private $productsPrice = 0;

    public function __construct(\Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getPrice($product);
    }

    public function getTotalPrice()
    {
        return $this->productsPrice
            + $this->productsPrice * 0.2
            + ($this->productsPrice > 10 ? 2 : 3);
    }

    public function count()
    {
        return count($this->products);
    }
}