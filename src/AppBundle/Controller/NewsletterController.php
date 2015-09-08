<?php


namespace AppBundle\Controller;

use AppBundle\Entity\EmailNewsletterCampaign;
use AppBundle\Entity\NewsletterCampaign;
use AppBundle\Form\NewsletterCampaignFormType;
use AppBundle\Service\Manager\NewsletterCampaignManager;
use AppBundle\Service\NewsletterSender;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
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
     * @DI\Inject("app.newsletter_campaign_manager")
     *
     * @var NewsletterCampaignManager
     */
    public $newsletterCampaignManager;

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
     * @DI\Inject("session")
     *
     * @var Session
     */
    public $session;

    /**
     * @Route("/newsletter/new", name="newsletter_new")
     *
     * @return Response
     *
     *
     * @throws \Exception
     * @throws \Twig_Error
     */
    public function newAction(Request $request)
    {
        $resolvedForm = $this->formFactory->create(
            new NewsletterCampaignFormType()
        );
        if ($request->isMethod("POST"))
        {
            $resolvedForm->handleRequest($request);
            if ($resolvedForm->isValid()) {
                $newsletterCampaign = $resolvedForm->getData();
                $this->newsletterCampaignManager->save($newsletterCampaign);
                $this->session->getFlashBag()->set('message', 'Saved!');
            }
        }

        return new Response(
            $this->twig->render(
                'AppBundle:Newsletter:new.html.twig',
                array(
                    'form' => $resolvedForm->createView(),
                    ''
                )
            )
        );
    }


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
