<?php


namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Class CompanyType
 * @package AppBundle\Form
 */
class CompanyType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options =array())
    {
        $builder
            ->add('name')
            ->add('products', 'collection', array(
                    'type' => new ProductType(),
                    'allow_add' => true,
                    'attr' => array(
                        'class' => 'product_type'
                    )
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Company'
            )
        );
    }

    public function getName()
    {
        return 'company_type';
    }
}
