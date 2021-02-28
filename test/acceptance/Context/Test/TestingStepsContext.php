<?php declare(strict_types=1);
namespace Test\AcceptanceTest\Context\Test;

use Behat\Behat\Context\Context;
use Test\TestCase;

class TestingStepsContext extends TestCase implements Context
{
    /**
     * @Given I have done something with :arg1
     *
     * @param string $arg1
     */
    public function iHaveDoneSomethingWith(string $arg1): void
    {
        $this->assertEquals('test', $arg1);
    }
}