<?php

/**
 * Class SmallProduct
 */
class SmallProduct implements DeliveryStrategyInterface
{
    protected $product;

    public function deliver()
    {
        foreach ($couriers as $courier)
        {
            $this->deliverWithVehicle($courier->getVehicle());
            break;
        }
    }

    /**
     * @return bool
     */
    public function isApplicable()
    {
        if ($this->product->getCategory()->getId() == 1)
        {
            return true;
        }
        return false;
    }
}
