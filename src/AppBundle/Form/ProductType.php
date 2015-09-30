<?php


namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Class ProductType
 * @package AppBundle\Form
 */
class ProductType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options = array())
    {
        $builder
            ->add('name')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Product'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'product_type';
    }
}
