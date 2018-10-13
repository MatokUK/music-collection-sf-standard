<?php

namespace FunctionalTests\MusicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArtistControllerTest extends WebTestCase
{
    const INVALID_ID = PHP_INT_MAX;

    public function testEditInvalidIdReturns404()
    {
        $client = static::createClient();
        $client->request('GET', '/admin/artist/'.self::INVALID_ID.'/edit');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testRemoveInvalidIdReturns404()
    {
        $client = static::createClient();
        $client->request('GET', '/admin/artist/'.self::INVALID_ID.'/remove');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
