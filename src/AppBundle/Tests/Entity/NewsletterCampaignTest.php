<?php

namespace AppBundle\Tests\Entity;
use AppBundle\Entity\NewsletterCampaign;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class NewsletterCampaignTest
 */
class NewsletterCampaignTest extends WebTestCase
{

    /**
     * @dataProvider getNewsletterCampaigns
     */
    public function testEntity($fixture)
    {
        $entity = new NewsletterCampaign();
        $this->assertInstanceOf('AppBundle\Entity\NewsletterCampaign', $entity);

        $name = $fixture['name'];
        $entity->setName($name);
        $this->assertEquals($name, $entity->getName());
    }

    public function getNewsletterCampaigns()
    {
        return array(
            array(
                'id' => 1,
                'name' => 'Test',
                'subject' => 'test subject'
            ),
            array(
                'id' => 2,
                'name' => '123',
                'subject' => 'Another test subject'
            )
        );
    }
}
