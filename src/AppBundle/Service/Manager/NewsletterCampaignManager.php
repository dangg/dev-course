<?php


namespace AppBundle\Service\Manager;
use AppBundle\Entity\Email;
use AppBundle\Entity\EmailNewsletterCampaign;
use AppBundle\Entity\NewsletterCampaign;
use Doctrine\Common\Collections\ArrayCollection;
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

    public function saveWithEmails(
        NewsletterCampaign $newlsetterCampaign,
        $emails,
        $type
    ) {
        $this->save($newlsetterCampaign);
        $this->addEmailsToNewsletterCampaign($newlsetterCampaign, $emails, $type);
    }
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

    /**
     * @param NewsletterCampaign $newsletterCampaign
     * @param $emails
     */
    public function addEmailsToNewsletterCampaign(NewsletterCampaign $newsletterCampaign, $emails, $type)
    {
        foreach ($emails as $email)
        {
            if ($this->newsletterCampaignHasEmail($newsletterCampaign, $email)) {
                continue;
            }
            $emailNewsletterCampaign = new EmailNewsletterCampaign();
            $emailNewsletterCampaign->setEmail($email);
            $emailNewsletterCampaign->setNewsletterCampaign($newsletterCampaign);
            $emailNewsletterCampaign->setType($type);
            $this->entityManager->persist($emailNewsletterCampaign);
        }
        $this->entityManager->flush();
    }

    /**
     * @param NewsletterCampaign $newsletterCampaign
     * @param $email
     * @return bool
     */
    public function newsletterCampaignHasEmail(NewsletterCampaign $newsletterCampaign, $email)
    {
        foreach ($newsletterCampaign->getEmailNewsletterCampaigns() as $emailNewsletterCampaign)
        {
            if ($emailNewsletterCampaign->getEmail()->getValue() === $email->getValue())
            {
                return true;
            }
        }
        return false;
    }
}
