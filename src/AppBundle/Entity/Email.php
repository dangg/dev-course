<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @ORM\Entity
 * @ORM\Table(name="emails")
 *
 * Class Email
 * @package AppBundle\Entity
 */
class Email
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string")
     */
    protected $value;

    /**
     * @var EmailNewsletterCampaign[]|ArrayCollection|array
     *
     * @ORM\OneToMany(
     *      targetEntity="EmailNewsletterCampaign",
     *      mappedBy="email"
     * )
     * @ORM\JoinColumn(
     *      name="id",
     *      referencedColumnName="email_id"
     * )
     */
    protected $emailNewsletterCampaigns;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(
     *      targetEntity="Company",
     *      inversedBy="emails",
     *      cascade={"persist"}
     *  )
     * @ORM\JoinColumn(
     *      name="company_id",
     *      referencedColumnName="id"
     * )
     */
    protected $company;

    /**
     * @var string
     *
     * @ORM\Column(name="email_cc", type="string")
     */
    protected $ccEmail;

    public function __construct()
    {
        $this->emailNewsletterCampaigns = new ArrayCollection();
    }

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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return EmailNewsletterCampaign[]|array|ArrayCollection
     */
    public function getEmailNewsletterCampaigns()
    {
        return $this->emailNewsletterCampaigns;
    }

    /**
     * @param EmailNewsletterCampaign[]|array|ArrayCollection $emailNewsletterCampaigns
     * @return Email
     */
    public function setEmailNewsletterCampaigns($emailNewsletterCampaigns)
    {
        $this->emailNewsletterCampaigns = $emailNewsletterCampaigns;
        return $this;
    }



    /**
     * Add emailNewsletterCampaigns
     *
     * @param \AppBundle\Entity\EmailNewsletterCampaign $emailNewsletterCampaigns
     * @return Email
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
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     *
     * @return $this
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string
     */
    public function getCcEmail()
    {
        return $this->ccEmail;
    }

    /**
     * @param string $ccEmail
     *
     * @return $this
     */
    public function setCcEmail($ccEmail)
    {
        $this->ccEmail = $ccEmail;
        return $this;
    }
}
