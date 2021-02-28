<?php declare(strict_types=1);
namespace AcceptanceTest\Context\Test;

use AcceptanceTest\AcceptanceTestCase;
use Behat\Behat\Context\Context;

class TestingStepsContext extends AcceptanceTestCase implements Context
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