<?php


namespace App\Tests\Controller;

use Symfony\Component\Panther\PantherTestCase;

class RegistrationControllerPantherTest extends PantherTestCase
{
    public function testRegistrationFormWithValidInputs()
    {
        $client = static::createPantherClient();

        // Access the registration page
        $crawler = $client->request('GET', '/register');

        // Wait for the page to be fully loaded
        //$client->waitFor('#registration-form');

        // Fill in the form
        $form = $crawler->selectButton('Inscrivez-vous')->form();
        $form['registration_form[username]'] = 'Arnold';
        $form['registration_form[email]'] = 'test@example.com';
        $form['registration_form[agreeTerms]'] = true;
        $form['registration_form[plainPassword]'] = 'password123';

        // Submit the form
        $client->submit($form);

        // Wait for the success message to be displayed
        // $client->waitFor('#success-container');

        // Assert the form was submitted successfully
        // Make sure the page title is what you expect after a successful registration
        $this->assertPageTitleContains('Inscription');

        // Use assertStringContainsString instead of assertSame
        //$this->assertStringContainsString('/registration_success', $client->getCrawler()->getUri());

        // Check the content of the page
        $this->assertStringContainsString('Vous êtes connecté', $client->getPageSource());

        // Uncomment this if there's a specific element containing the success message
        // $this->assertSelectorTextContains('#success-container', 'vous êtes connecté !');


    }
}
