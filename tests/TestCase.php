<?php

namespace Thiagoprz\Onesignal\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Thiagoprz\Onesignal\OnesignalServiceProvider;

class TestCase extends OrchestraTestCase
{

    /**
     * @param $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            OnesignalServiceProvider::class,
        ];
    }

    /**
     * @param $app
     * @return void
     */
    public function getEnvironmentSetUp($app)
    {
//        $onesignal = require __DIR__ . '/../src/config/onesignal.php';
//        config()->set('onesignal.api_app_key', $onesignal['api_app_key']);
//        dump($onesignal);
        $app->loadEnvironmentFrom('.env.testing');
//        dump(env('ONESIGNAL_API_APP_KEY'));
//        $app['config']->set('database.default', 'testbench');
//        $app['config']->set('database.connections.testbench', $database['sqlite']);
//        $app['config']->set('app.debug', true);
//        $app['config']->set('logging.default', 'daily');
//        $app['config']->set('logging.channels.daily.path', 'logs/testing.log');
//        touch(__DIR__ . '/../database/tests/testing.sqlite');
//        require_once __DIR__ . '/../database/tests/migrations/create_dummy_table.php';
//        (new \CreateDummyTable)->up();
    }
}