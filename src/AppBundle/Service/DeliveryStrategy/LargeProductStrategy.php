<?php

/**
 * Class LargeProductStrategy
 */
class LargeProductStrategy
    extends BaseDelivery
{

    public function deliver()
    {
        foreach ($couriers as $courier)
        {
            if ($courier->hasVan() && $courier->getVan()->getNumberOfDrivers() == 2)
            {
                $this->deliverWithVanFromCourier(
                   $courier->getVan(),
                    $courier
                );
                $courier->setProductWeight(
                    $this->calculateWeightForProduct($product);
                );
            }
        }
    }
}
