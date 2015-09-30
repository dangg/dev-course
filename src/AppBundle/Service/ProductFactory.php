<?php


namespace AppBundle\Service;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;


/**
 * @Service("app.product_factory")
 *
 * Class ProductFactory
 * @package AppBundle\Service
 */
class ProductFactory
{
    const TYPE_PHONE = 'telefon';

    const TYPE_TV = 'tv';

    const TYPE_ACCESSORY = 'accesoriu';

    /**
     * @DI\Inject("doctrine.orm.default_entity_manager")
     *
     * @var EntityManager
     */
    public $entityManager;


    public function createProductByType($type = '')
    {
        switch ($type) {
            case self::TYPE_PHONE:
                return $this->createPhoneType();
            case self::TYPE_TV:
                return $this->createTvType();
            case self::TYPE_ACCESSORY:
                return $this->createAccessoryType();
            default:
                return new Product();
        }
    }

    public function createAccessoryType()
    {
        $product = new Product();
        $product->setName('Accesoriu ');
        return $product;
    }

    public function createTvType()
    {

        $product = new Product();
        $product->setCategory($this->entityManager->getRepository(
            'AppBundle:Category'
        )->findOneByCategoryName('Televizoare'));

        return $product;
    }

    public function createPhoneType()
    {
        $product = new Product();
        $product->setCategory($this->entityManager->getRepository(
            'AppBundle:Category'
        )->findOneByCategoryName('Telefoane mobile'));

        return $product;
    }
}
