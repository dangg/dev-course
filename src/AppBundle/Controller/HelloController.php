<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HelloController
{
    /**
     * @Route("/hello/{name}", name="hello")
     */
    public function indexAction($name)
    {
        return new Response('<html><body>Hello '.$name.'!</body></html>');
    }

    public function setDatabase($database)
    {
        echo "Database set to " . $database;
    }
}