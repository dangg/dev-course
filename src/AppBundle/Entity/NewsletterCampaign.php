<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="newsletter_campaign")
 */
class NewsletterCampaign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @Assert\Length(min="5", max="10")
     * @Assert\NotNull
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string")
     * @Assert\Length(min="5", max="10")
     */
    protected $subject;

    /**
     * @ORM\OneToMany(
     *      targetEntity="EmailNewsletterCampaign",
     *      mappedBy="newsletterCampaign"
     * )
     * @ORM\JoinColumn(
     *      name="id",
     *      referencedColumnName="newsletter_campaign_id"
     * )
     *
     * @var EmailNewsletterCampaign[]|ArrayCollection|array
     */
    protected $emailNewsletterCampaigns;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->emailNewsletterCampaigns = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add emailNewsletterCampaigns
     *
     * @param \AppBundle\Entity\EmailNewsletterCampaign $emailNewsletterCampaigns
     * @return NewsletterCampaign
     */
    public function addEmailNewsletterCampaign(\AppBundle\Entity\EmailNewsletterCampaign $emailNewsletterCampaigns)
    {
        $this->emailNewsletterCampaigns[] = $emailNewsletterCampaigns;

        return $this;
    }

    /**
     * Remove emailNewsletterCampaigns
     *
     * @param \AppBundle\Entity\EmailNewsletterCampaign $emailNewsletterCampaigns
     */
    public function removeEmailNewsletterCampaign(\AppBundle\Entity\EmailNewsletterCampaign $emailNewsletterCampaigns)
    {
        $this->emailNewsletterCampaigns->removeElement($emailNewsletterCampaigns);
    }

    /**
     * Get emailNewsletterCampaigns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmailNewsletterCampaigns()
    {
        return $this->emailNewsletterCampaigns;
    }
}
