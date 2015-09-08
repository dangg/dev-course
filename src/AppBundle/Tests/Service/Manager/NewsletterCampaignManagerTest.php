<?php

/**
 * Class NewsletterCampaignManagerTest
 */
class NewsletterCampaignManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{


    public function testSave()
    {
        $campaign = new \AppBundle\Entity\NewsletterCampaign();
        $campaign->setName('123');
        $campaign->setSubject('123');

        self::bootKernel();
        $container = static::$kernel->getContainer();

        $manager = $container->get('app.newsletter_campaign_manager');
        $this->getExpectedException();
        try {
            $manager->save($campaign);
        } catch (\Exception $e) {

            $this->assertEquals('Errors found', $e->getMessage());
        }
    }
}
