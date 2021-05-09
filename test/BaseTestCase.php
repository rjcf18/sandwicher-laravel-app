<?php declare(strict_types=1);
namespace Test;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase;

abstract class BaseTestCase extends TestCase
{
    public function __construct()
    {
        putenv('APP_ENV=testing');

        parent::__construct();

        $this->setUp();

        $this->artisan('config:clear');

        $this->withoutExceptionHandling();
    }

    public function createApplication(): Application
    {
        /** @var Application $app */
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @beforeScenario
     */
    public function migrate()
    {
        $this->artisan('migrate:fresh');
    }
}
