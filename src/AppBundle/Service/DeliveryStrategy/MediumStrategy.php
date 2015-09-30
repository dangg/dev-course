<?php

/**
 * Class MediumStrategy
 */
class MediumStrategy implements DeliveryStrategyInterface
{

    public function deliver()
    {
        foreach ($couriers as $courier)
        {
            if (
                $this->isNotPersonal(
                    $courier->getVehicle()
                )
            )
            {
                $this->deliverWithVehicle($courier->getVehicle());
            }
        }
    }
}
