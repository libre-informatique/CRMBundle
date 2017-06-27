<?php

namespace {NameSpace}\Tests\Web;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UrlTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
    
    public function urlProvider()
    {
        return array(
            array('/'),
            array('/admin/dashboard')
            // Add here page to test ...
        );
    }
    
    public function tryToTest()
    {
        $client = self::createClient();
        
        $crawler = $client->request('GET', '/admin/dashboard');

        /* Example */
        /*
        $link = $crawler->selectLink('Add new')->link();
        $crawler = $client->click($link);
        $this->assertContains(
            'Title',
            $crawler->filter('label')
        );
        */
    }
}
