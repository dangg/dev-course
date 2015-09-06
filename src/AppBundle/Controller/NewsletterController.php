<?php


namespace AppBundle\Controller;

use AppBundle\Entity\NewsletterCampaign;
use AppBundle\Service\NewsletterSender;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Parser;
use Symfony\Component\Routing\Annotation\Route;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityManager;

class NewsletterController
{

    /**
     * @DI\Inject("app.newsletter_sender")
     *
     * @var NewsletterSender
     */
    public $newsletterSender;

    /**
     * @DI\Inject("doctrine.orm.default_entity_manager")
     *
     * @var EntityManager
     */
    public $entityManager;

    public function saveAction()
    {
        $newsletterCampaign = new NewsletterCampaign();
        $newsletterCampaign->setName('Nume campanie');
        $newsletterCampaign->setSubject('Subiect de test');

        $this->entityManager->persist($newsletterCampaign);
        $this->entityManager->flush();
    }

    /**
     * @Route("/newsletter/send", name="newsletter_send")
     */
    public function sendAction()
    {
        $yaml = new Parser();
        $values = $yaml->parse(file_get_contents(__DIR__ . "/../Resources/config/newsletter.yml"));
        foreach ($values['newsletter']['email_list'] as $value)
        {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                //throw new \Exception('Invalid email address');
            }
        }
        return new Response();
    }

}
