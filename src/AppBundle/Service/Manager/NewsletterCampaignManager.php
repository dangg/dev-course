<?php


namespace AppBundle\Service\Manager;
use AppBundle\Entity\NewsletterCampaign;
use Doctrine\ORM\EntityManager;
use JMS\DiExtraBundle\Annotation as DI;
use JMS\DiExtraBundle\Annotation\Service;
use Symfony\Component\Validator\Validation;

/**
 * @Service("app.newsletter_campaign_manager")
 *
 * Class NewsletterCampaignManager
 * @package AppBundle\Service\Manager
 */
class NewsletterCampaignManager
{
    /**
     * @DI\Inject("doctrine.orm.default_entity_manager")
     *
     * @var EntityManager
     */
    public $entityManager;

    /**
     * @DI\Inject("validator")
     *
     */
    public $validator;

    /**
     * @param NewsletterCampaign $newsletterCampaign
     *
     * @return void
     */
    public function save(NewsletterCampaign $newsletterCampaign)
    {
        $errors = $this->validator->validate($newsletterCampaign);
        if(count($errors) > 0) {
            throw new \Exception('Errors found');
        }

        $this->entityManager->persist($newsletterCampaign);
        $this->entityManager->flush();
    }
}
