<?php


namespace AppBundle\Tests\Controller;
use AppBundle\Controller\NewsletterController;
use AppBundle\Service\Manager\NewsletterCampaignManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class NewsletterControllerTest
 * @package AppBundle\Tests\Controller
 */
class NewsletterControllerTest extends WebTestCase
{

    public function testNewAction()
    {
        self::bootKernel();
        $container = static::$kernel->getContainer();

        $controller = new NewsletterController();
        $manager = new NewsletterCampaignManager();
        $manager->entityManager = $this->getMockForEntityManagerWithPersistExpectation();
        $controller->newsletterCampaignManager = $manager;
        $controller->formFactory = $container->get('form.factory');
        $controller->twig = $container->get('twig');

        $request = new Request(array(), array());
        $request->setMethod("POST");
        $controller->newAction($request);
    }


    public function testSaveAction()
    {
        $controller = new NewsletterController();
        $mock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->setMethods(array('persist', 'flush'))
            ->getMock();
        $mock->expects($this->once())
            ->method('persist')
            ->will($this->returnValue(''))
        ;
        $controller->entityManager = $mock;

        $controller->saveAction();
    }

    public function getMockForEntityManagerWithPersistExpectation()
    {
        $mock = $this->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->setMethods(array('persist', 'flush'))
            ->getMock();
        $mock->expects($this->once())
            ->method('persist')
            ->will($this->returnValue(''))
        ;
        return $mock;
    }

}
