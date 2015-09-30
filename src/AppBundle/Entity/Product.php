<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="products")
 *
 * Class Product
 * @package AppBundle\Entity
 */
class Product
{

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(
     *      targetEntity="Category",
     *      inversedBy="products"
     * )
     * @ORM\JoinColumn(
     *      name="category_id",
     *      referencedColumnName="id"
     * )
     */
    protected $category;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(
     *      targetEntity="Company",
     *      inversedBy="products"
     * )
     * @ORM\JoinColumn(
     *      name="company_id",
     *      referencedColumnName="id"
     * )
     */
    protected $company;

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
}
