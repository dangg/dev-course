<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="categories")
 *
 * Class Category
 * @package AppBundle\Entity
 */
class Category
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="string")
     */
    protected $categoryName;

    /**
     * @var Product[]|ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="Product",
     *      mappedBy="category"
     * )
     * @ORM\JoinColumn(
     *      name="id",
     *      referencedColumnName="category_id"
     * )
     */
    protected $products;

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
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     *
     * @return $this
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
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

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->categoryName;
    }
}
