<?php


namespace AppBundle\Form;
use AppBundle\Entity\Email;
use AppBundle\Form\Transformer\HtmlTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Class EmailType
 * @package AppBundle\Form
 */
class EmailType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options =array())
    {
        $builder
            ->add('value')
            ->add('company')
            ->add('companyNew', 'collection', array(
                'type' => new CompanyType(),
                'mapped' => false,
                'allow_add' => true,
                'attr' => array(
                    'class' => 'new_company'
                )
            ))
            ->addEventListener(
                FormEvents::PRE_SET_DATA, function (FormEvent $formEvent) {

                    $formEvent->getForm()->add(
                        'ccEmail'
                    );
                }
            )

            ->addEventListener(
                FormEvents::SUBMIT, function (FormEvent $formEvent) {
                    $newCompany = $formEvent->getForm()->get('companyNew')->getData();

                    if (array_key_exists(0, $newCompany)) {
                        $formEvent->getData()->setCompany($newCompany[0]);
                    }
                }
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Email'
            )
        );
    }

    public function getName()
    {
        return 'email_type';
    }
}
