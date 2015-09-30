<?php

/**
 * Class CompanyTypeTest
 */
class CompanyTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{

    /**
     * @var array $data
     *
     * @dataProvider getCompaniesData
     */
    public function testFormType($data)
    {
        $form = $this->factory->create(new \AppBundle\Form\CompanyType());

        $form->submit($data);
        //var_dump($form->isSynchronized());die('t');

        $this->assertInstanceOf('AppBundle\Entity\Company', $form->getData());
    }

    /**
     * @return array
     */
    public function getCompaniesData()
    {
        return array(
            array(
                'data' => array(
                    'name' => 'New company',
                    'products' => array()
                )
            ),
            array(
                'data' => array(
                    'name' => 'Second Company',
                    'products' => array()
                )
            )
        );
    }
}
