<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\DefaultController;
use Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator;
use Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testIndexWithResponse()
    {
        $request = new Request();
        $controller = new DefaultController();

        static::bootKernel(array());
        $container = new Container();
        $container->setParameter('kernel.root_dir', 'test');
        $container->set('templating', static::$kernel->getContainer()->get('templating'));

        $controller->setContainer($container);
        $response = $controller->indexAction($request);


        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $response);
    }
}
