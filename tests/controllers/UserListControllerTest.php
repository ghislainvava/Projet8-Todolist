<?php

namespace App\Tests\Controller;

use Symfony\Component\Panther\PantherTestCase;

class UserListControllerTest extends PantherTestCase
{
    public function testUserList(): void
    {
        $client = static::createPantherClient();

        // Visitez la page de la liste des utilisateurs
        $crawler = $client->request('GET', '/users');

        // Vérifiez que la page s'est chargée correctement

        $this->assertPageTitleContains('Liste des utilisateurs');

        // Vérifiez que le tableau des utilisateurs est présent
        //$this->assertCount(1, $crawler->filter("dfssdf"));

        // Si vous avez des utilisateurs dans votre base de données de test, vous pouvez vérifier qu'ils sont affichés :
        //$this->assertStringContainsString('dfssdf', $client->getResponse()->getContent());
        $this->assertStringContainsString('user@email.com', $client->getResponse()->getContent());

        // Autres assertions...
    }
}
