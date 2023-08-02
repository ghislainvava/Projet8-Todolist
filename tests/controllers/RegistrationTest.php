<?php

use Symfony\Component\Panther\PantherTestCase;

class RegistrationTest extends PantherTestCase
{
    public function testRegistrationSuccessRedirect()
    {
        $client = static::createPantherClient();

        // Accéder à la page de connexion
        $crawler = $client->request('GET', '/login');

        // Remplir le formulaire de connexion
        $form = $crawler->selectButton('Se connecter')->form();
        $form['registration_form[username]'] = 'votre_nom_d_utilisateur';
        $form['registration_form[email]'] = 'votre_email@example.com';
        $form['registration_form[agreeTerms]'] = true;
        $form['registration_form[plainPassword]'] = 'votre_mot_de_passe';

        // Soumettre le formulaire
        $crawler = $client->submit($form);

        // Vérifier la redirection vers /registration_success
        $this->assertStringContainsString('/registration_success', $client->getCurrentURL());
    }
}
