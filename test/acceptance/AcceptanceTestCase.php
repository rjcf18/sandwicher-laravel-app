<?php declare(strict_types=1);
namespace AcceptanceTest;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Contracts\Console\Kernel;

abstract class AcceptanceTestCase extends TestCase
{
    public function createApplication(): Application
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}