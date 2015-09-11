<?php


namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('value', 'email');
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
