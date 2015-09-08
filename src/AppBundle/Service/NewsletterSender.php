<?php

namespace AppBundle\Service;

use JMS\DiExtraBundle\Annotation\Service;

/**
 * @Service("app.newsletter_sender")
 */
class NewsletterSender
{
    public function test()
    {
        echo "A";
    }

}
