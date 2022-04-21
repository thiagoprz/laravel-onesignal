<?php

namespace Thiagoprz\Onesignal\Interfaces;

use Thiagoprz\Onesignal\Enums\Scope;
use Thiagoprz\Onesignal\OneSignal\Responses\ClientResponse;

interface ClientInterface
{
    public function get(string $endpoint, array $params, Scope $scope): ClientResponse;
    public function post(string $endpoint, $body, Scope $scope): ClientResponse;
    public function put(string $endpoint, $body, Scope $scope): ClientResponse;
    public function delete(string $endpoint, Scope $scope): ClientResponse;
}