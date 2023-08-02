<?php

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testShowRegistrationForm(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');

        $this->assertResponseIsSuccessful();

        $this->assertStringContainsString(
            'Enregistrez-vous !',
            $crawler->filter('body')->text()    // Chercher le texte dans body
        );
    }
}
