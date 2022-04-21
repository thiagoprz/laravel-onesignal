<?php

namespace Thiagoprz\Onesignal\Tests\Unit\Client;

use Thiagoprz\Onesignal\Exceptions\OnesignalClientException;
use Thiagoprz\Onesignal\OneSignal\Client;
use Thiagoprz\Onesignal\Tests\TestCase;

class KeyTest extends TestCase
{

    public function test_missing_key_failure()
    {
        config()->set('onesignal.app_key', null);
        $this->expectException(OnesignalClientException::class);
        $client = new Client();
    }

}