<?php declare(strict_types=1);
namespace Test\AcceptanceTest\Context\Meal;

use Behat\Behat\Context\Context;
use Illuminate\Testing\TestResponse;
use Test\BaseTestCase;

class MealCreationStepsContext extends BaseTestCase implements Context
{
    private TestResponse $creationResponse;

    /**
     * @Given there are no open meals
     */
    public function thereAreNoOpenMeals()
    {
        $this->assertDatabaseMissing('meals', [
            'status' => 1
        ]);
    }

    /**
     * @When I attempt to open a meal registration
     */
    public function attemptToOpenMealRegistration()
    {
        $this->creationResponse = $this->withoutMiddleware()->followingRedirects()->post('/admin/meals');
    }

    /**
     * @Given there is a meal already open
     */
    public function mealIsAlreadyOpen()
    {
        $this->withoutMiddleware()->followingRedirects()->post('/admin/meals');

        $this->assertDatabaseHas('meals', [
            'status' => 1
        ]);
    }

    /**
     * @Then /^the meal registration fails with message "([^"]*)"$/
     *
     * @param string $errorMessage
     */
    public function mealRegistrationFailsWithMessage(string $errorMessage)
    {
        $this->creationResponse->assertSuccessful();
        $this->creationResponse->assertSeeText($errorMessage);
    }

    /**
     * @Then the meal registration is successful
     */
    public function mealRegistrationIsSuccessful()
    {
        $this->creationResponse->assertSuccessful();
        $this->creationResponse->assertSeeText('Meal registration opened successfully.');

        $this->assertDatabaseHas('meals', [
            'status' => 1
        ]);
    }
}