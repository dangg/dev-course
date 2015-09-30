<?php


namespace AppBundle\Form;
use AppBundle\Entity\EmailNewsletterCampaign;
use AppBundle\Form\Transformer\HtmlTransformer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Class NewsletterCampaignFormType
 * @package AppBundle\Form
 */
class NewsletterCampaignFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options = array())
    {
        $builder
            ->add('name')
            ->add('subject')
            ->add('type', 'choice', array(
                'choices' => array(
                    EmailNewsletterCampaign::CAMPAIGN_TYPE_NORMAL => 'Normal',
                    EmailNewsletterCampaign::CAMPAIGN_TYPE_TEST => 'Test'
                ),
                'mapped' => false
            ))
            ->add('emails', 'entity', array(
                'class' => 'AppBundle:Email',
                'mapped' => false, // don't map with any field on the object NewsletterCampaign
                'multiple' => true, // Allow selecting more than one email
                'expanded' => true, // Expand the list of all emails so it can be seen easily
                'data' => $options['emails'],
                'block_name' => 'emails_block'
            ))
            ->add('emailNew', 'collection', array(
                'type' => new EmailType(),
                'mapped' => false,
                'allow_add' => true,
            ))
            ->add('save', 'submit');
    }

    /**
     * @param OptionsResolverInterface $optionsResolver
     */
    public function configureOptions(OptionsResolver $optionsResolver)
    {
        $optionsResolver->setDefaults(
            array(
                'csrf_protection' => false,
                'data_class' => 'AppBundle\Entity\NewsletterCampaign',
                'emails' => array()
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter_campaign_form';
    }
}
