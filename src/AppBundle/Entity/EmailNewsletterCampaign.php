<?php


namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emails_newsletter_campaigns")
 *
 * Class EmailNewsletterCampaign
 * @package AppBundle\Entity
 */
class EmailNewsletterCampaign
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="Email",
     *      inversedBy="emailNewsletterCampaigns"
     *  )
     *
     * @var Email
     */
    protected $email;

    /**
     * @ORM\ManyToOne(
     *      targetEntity="NewsletterCampaign",
     *      inversedBy="emailNewsletterCampaigns"
     * )
     *
     * @var NewsletterCampaign
     */
    protected $newsletterCampaign;

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param \AppBundle\Entity\Email $email
     * @return EmailNewsletterCampaign
     */
    public function setEmail(\AppBundle\Entity\Email $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return \AppBundle\Entity\Email 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set newsletterCampaign
     *
     * @param \AppBundle\Entity\NewsletterCampaign $newsletterCampaign
     * @return EmailNewsletterCampaign
     */
    public function setNewsletterCampaign(\AppBundle\Entity\NewsletterCampaign $newsletterCampaign = null)
    {
        $this->newsletterCampaign = $newsletterCampaign;

        return $this;
    }

    /**
     * Get newsletterCampaign
     *
     * @return \AppBundle\Entity\NewsletterCampaign 
     */
    public function getNewsletterCampaign()
    {
        return $this->newsletterCampaign;
    }
}
