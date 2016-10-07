<?php
/**
 * Created by PhpStorm.
 * User: aming
 * Date: 2016/10/7
 * Time: 上午11:48
 */

class Shelf
{
    private $priceMap = array();

    public function setProductPrice($product, $price)
    {
        $this->priceMap[$product] = $price;
    }

    public function getPrice($product)
    {
        return $this->priceMap[$product];
    }
}