<?php

namespace App\Tests\Unit;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SmokeTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testUrlWorks(string $url, bool $redirects = false, ?string $expectedLocation = null)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        if ($redirects) {
            $this->assertResponseRedirects($expectedLocation);
        } else {
            $this->assertResponseStatusCodeSame(200);
        }
    }

    public function urlProvider()
    {
        // TODO: use dynamic protocol and hostname
        yield ['/'];
        yield ['/login'];
        yield ['/logout', true, 'http://localhost/'];
        yield ['/admin', true, 'http://localhost/login'];
    }
}
