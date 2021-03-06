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
    use Modifiable;

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
     *      mappedBy="newsletterCampaign",
     *      cascade={"persist"},
     *      fetch="EXTRA_LAZY"
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_sent", type="datetime")
     */
    protected $dateSent;

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

    public function getAssociatedEmails()
    {
        $emails = array();
        foreach ($this->getEmailNewsletterCampaigns() as $campaign)
        {
            $emails[] = $campaign->getEmail();
        }
        return $emails;
    }

    /**
     * @return \DateTime
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * @param \DateTime $dateSent
     *
     * @return $this
     */
    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;
        return $this;
    }

    /**
     * @param EmailNewsletterCampaign[]|array|ArrayCollection $emailNewsletterCampaigns
     *
     * @return $this
     */
    public function setEmailNewsletterCampaigns($emailNewsletterCampaigns)
    {
        $this->emailNewsletterCampaigns = $emailNewsletterCampaigns;
        return $this;
    }
}
