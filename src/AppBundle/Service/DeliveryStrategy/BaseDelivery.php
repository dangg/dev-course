<?php

/**
 * Class BaseDelivery
 */
abstract class BaseDelivery
{

    abstract public function deliver();
    /**
     * @param \AppBundle\Entity\Product $product
     */
    public function calculateWeightForProduct($product)
    {
        if (strpos($product->getName(), 'Accesoriu') !== false) {
            return 0.5;
        }
        if ($product->getCategory() == 3) {
            return 100;
        }
        if ($product->getCategory() == 2) {
            return 10;
        }
        if ($product->getCategory() == 1) {
            return 1;
        }
    }
}
