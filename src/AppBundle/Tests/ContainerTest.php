<?php

class TestService
{

}

/**
 * Class ContainerTest
 */
class ContainerTest extends \PHPUnit_Framework_TestCase
{

    public function testContainer()
    {
        $container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
        $container->register('test_service', 'TestService');

        $this->assertInstanceOf(
            'TestService',
            $container->get(
                'test_service'
            )
        );
    }
}

