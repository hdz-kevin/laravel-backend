#!/usr/bin/env php

<?php

/**
 * Sobreescritura de métodos.
 * Permite a una clase hija modificar la implementación de un método en la clase padre.
 */

class Discount
{
    protected float $discount = 0;

    public function __construct(float $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(float $price): float
    {
        echo "Calculating discount...\n";
        return $price * $this->discount;
    }
}

class SpecialDiscount extends Discount
{
    const SPECIAL_DISCOUNT = 2;

    public function getDiscount(float $price): float
    {
        echo "Calculating special discount...\n";
        return $price * $this->discount * self::SPECIAL_DISCOUNT;
    }
}

$sd = new SpecialDiscount(0.1);
echo $sd->getDiscount(100) . PHP_EOL;
