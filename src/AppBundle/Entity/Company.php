<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="companies")
 *
 * Class Company
 * @package AppBundle\Entity
 */
class Company
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Email[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="Email",
     *      mappedBy="company"
     * )
     * @ORM\JoinColumn(
     *      name="id",
     *      referencedColumnName="company_id"
     * )
     */
    protected $emails;

    /**
     * @var ArrayCollection|Product[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Product",
     *      mappedBy="company"
     * )
     * @ORM\JoinColumn(
     *      name="id",
     *      referencedColumnName="company_id"
     * )
     */
    protected $products;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * @return Product[]|ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product[]|ArrayCollection $products
     *
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Email[]|ArrayCollection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param Email[]|ArrayCollection $emails
     *
     * @return $this
     */
    public function setEmails($emails)
    {
        $this->emails = $emails;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
