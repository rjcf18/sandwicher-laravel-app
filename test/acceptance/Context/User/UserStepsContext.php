<?php declare(strict_types=1);
namespace Test\AcceptanceTest\Context\User;

use Behat\Behat\Context\Context;
use Test\BaseTestCase;
use Throwable;

class UserStepsContext extends BaseTestCase implements Context
{
    /**
     * @Given I login as admin
     */
    public function loginAsAdmin()
    {
        try {
            $response = $this->followingRedirects()->postJson('login', [
                'email' => 'admin@email.com',
                'password' => '12345678'
            ]);
        } catch (Throwable $throwable) {
            $response = $this->followingRedirects()->post('register', [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'password' => '12345678',
                'password_confirmation' => '12345678'
            ]);
        }

        $response->assertSuccessful();

        $this->assertAuthenticated();
    }
}