<?php


namespace AppBundle\Controller;
use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use AppBundle\Service\ProductFactory;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactory;
use Symfony\Bridge\Twig\TwigEngine;

/**
 * Class ProductController
 * @package AppBundle\Controller
 */
class ProductController
{

    const PARAM_PRODUCT_TYPE = 'product_type';

    /**
     * @DI\Inject("twig")
     *
     * @var TwigEngine
     */
    public $twig;

    /**
     * @DI\Inject("form.factory")
     *
     * @var FormFactory
     */
    public $formFactory;

    /**
     * @var ProductFactory
     *
     * @DI\Inject("app.product_factory")
     */
    public $productFactory;

    /**
     * @Route("/product/new/{product_type}", name="new_product")
     *
     * @param Request $request
     */
    public function newAction(Request $request)
    {
        $form =  $this->formFactory->create(
            new ProductType(),
            $this->productFactory->createProductByType(
                $request->get(self::PARAM_PRODUCT_TYPE)
            )
        );

        if ($request->getMethod() == "POST") {
            $form->handleRequest($request);
            if ($form->isValid()) {
                return new Response("Saved!");
            }
        }
        return new Response(
            $this->twig->render(
                'AppBundle:Product:new.html.twig',
                array(
                    'form' => $form->createView()
                )
            )
        );
    }
}
