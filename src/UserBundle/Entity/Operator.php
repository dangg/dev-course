<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 *
 * Class Operator
 */
class Operator extends User
{

    /**
     * @var string
     *
     * @ORM\Column(name="operation_area", type="string")
     */
    protected $operationArea;
}
