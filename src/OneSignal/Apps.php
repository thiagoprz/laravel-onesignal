<?php

namespace Thiagoprz\Onesignal\OneSignal;

use Psr\Log\LoggerInterface;
use Thiagoprz\Onesignal\Enums\Scope;
use Thiagoprz\Onesignal\Interfaces\AppsInterface;
use Thiagoprz\Onesignal\Interfaces\ClientInterface;
use Thiagoprz\Onesignal\OneSignal\Responses\AppResponse;
use Thiagoprz\Onesignal\Traits\Logable;

class Apps implements AppsInterface
{
    use Logable;

    private ClientInterface $client;
    private LoggerInterface $logger;

    public function __construct(ClientInterface $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @return AppResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function viewApp(): AppResponse
    {
        $response = $this->client->get('apps/' . config('onesignal.app_id'), [], Scope::USER);
        return new AppResponse($response->body);
    }
}