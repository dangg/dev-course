<?php


namespace AppBundle\Controller;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class DeliveryController
 * @package AppBundle\Controller
 */
class DeliveryController
{
    /**
     * @DI\Inject("doctrine.orm.default_entity_manager")
     *
     * @var EntityManager
     */
    public $entityManager;

    public function deliverAction(Request $request)
    {
        $product = $this->entityManager->getRepository(
            'AppBundle:Product'
        )->find($request->get('product_id'));

        foreach ($strategies as $strategy) {
            if ($strategy->isApplicable()) {
                $strategy->deliver();
                break;
            }
        }
        switch ($product->getCategory()->getId())
        {
            case 1:
                $strategy = new \SmallProduct();
                break;
            case 2:
                $strategy = new \MediumStrategy();
                break;
            case 3:
                $strategy = new \LargeProductStrategy();
                break;
            default;
                throw \Exception('No strategy defined for product\'s category');
        }
        $strategy->deliver();
    }
}
