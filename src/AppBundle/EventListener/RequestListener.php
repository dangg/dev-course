<?php


namespace AppBundle\EventListener;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


/**
 * Class RequestListener
 * @package AppBundle
 */
class RequestListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $collection = new RouteCollection();
        $collection->addPrefix('en');
        $collection->add('test', new Route('/hello', array(
            'controller' => 'AppBundle/Controller/HelloController',
            'action' => 'index'
        )));
        $secondCollection = new RouteCollection();
        $secondCollection->addPrefix('prod');
        $collection->addCollection($secondCollection);
        '/prod/en/hello/name';
    }
}
