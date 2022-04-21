<?php

namespace Thiagoprz\Onesignal\Tests\Unit\Apps;

use Thiagoprz\Onesignal\OneSignal\Apps;
use Thiagoprz\Onesignal\OneSignal\Client;
use Thiagoprz\Onesignal\OneSignal\Responses\AppResponse;
use Thiagoprz\Onesignal\Tests\TestCase;
use function logger;

class ViewAppTest extends TestCase
{

    /**
     * @return void
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function test_app_view_success()
    {
        $client = new Client();
        $logger = logger();
        $apps = new Apps($client, $logger);
        $app = $apps->viewApp();
        $this->assertInstanceOf(AppResponse::class, $app);
        $this->assertEquals(config('onesignal.app_id'), $app->id);
    }
}