<?php


namespace AppBundle\Tests\Controller;
use AppBundle\Controller\NewsletterController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class NewsletterControllerTest
 * @package AppBundle\Tests\Controller
 */
class NewsletterControllerTest extends WebTestCase
{

    public function testSaveAction()
    {
        $controller = new NewsletterController();
        $mock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->setMethods(array('persist', 'flush'))
            ->getMock();
        $mock->expects($this->any())
            ->method('persist')
            ->will($this->returnValue(''))
        ;
        $controller->entityManager = $mock;

        $controller->saveAction();
    }
}
