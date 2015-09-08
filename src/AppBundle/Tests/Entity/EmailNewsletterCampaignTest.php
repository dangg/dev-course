<?php


namespace AppBundle\Tests\Entity;
use AppBundle\Entity\EmailNewsletterCampaign;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


/**
 * Class EmailNewsletterCampaignTest
 * @package AppBundle\Tests\Entity
 */
class EmailNewsletterCampaignTest extends WebTestCase
{
    public function testgenerateOneTimeOnlyDataTest()
    {
        self::bootKernel();
        $container = static::$kernel->getContainer();

        $data = new EmailNewsletterCampaign();
        $container->get('doctrine.orm.default_entity_manager')->persist($data);
        $container->get('doctrine.orm.default_entity_manager')->flush();
    }
}
