<?php

namespace PublicBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CatalogoControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testVehiculo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '{modelo}');
    }

    public function testKit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '{modelo}/{kit}');
    }

}
