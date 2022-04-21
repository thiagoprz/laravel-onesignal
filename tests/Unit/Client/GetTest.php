<?php

namespace Thiagoprz\Onesignal\Tests\Unit\Client;

use Illuminate\Http\Response;
use Thiagoprz\Onesignal\Enums\Scope;
use Thiagoprz\Onesignal\OneSignal\Client;
use Thiagoprz\Onesignal\Tests\TestCase;

class GetTest extends TestCase
{
    public function test_get_success()
    {
        $client = new Client();
        $response = $client->get('apps/' . config('onesignal.app_id'), [], Scope::USER);
        $this->assertEquals(Response::HTTP_OK, $response->status);
        $this->assertEquals(config('onesignal.app_id'), $response->body['id']);
    }
}