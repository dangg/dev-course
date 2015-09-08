<?php

namespace AppBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HelloControllerTest
 * @package AppBundle\Tests\Controller
 */
class HelloControllerTest extends KernelTestCase
{
    public function testIndexAction()
    {
        self::bootKernel();

        $controller = static::$kernel->getContainer()->get('app.hello_controller');
        /** @var Response $response */
        $response = $controller->indexAction('name');

        $this->assertContains('name', $response->getContent());
    }
}
