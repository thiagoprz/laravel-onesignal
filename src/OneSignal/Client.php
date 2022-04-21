<?php

namespace Thiagoprz\Onesignal\OneSignal;

use GuzzleHttp\Client as HttpClient;
use Thiagoprz\Onesignal\Enums\Scope;
use Thiagoprz\Onesignal\Exceptions\OnesignalClientException;
use Thiagoprz\Onesignal\Interfaces\ClientInterface;
use Thiagoprz\Onesignal\OneSignal\Responses\ClientResponse;

class Client implements ClientInterface
{
    const API_ENDPOINT = 'https://onesignal.com/api/v1/';

    /**
     * @var HttpClient
     */
    private HttpClient $httpClient;

    /**
     * Client constructor
     *
     * @throws OnesignalClientException
     */
    public function __construct()
    {
        $apiKey = config('onesignal.app_key');
        if (!$apiKey) {
            throw new OnesignalClientException('Missing One Signal APP API key.');
        }
        $this->httpClient = new HttpClient([
            'base_uri' => self::API_ENDPOINT,
        ]);
    }

    /**
     * @param string $endpoint
     * @param array $params
     * @param Scope $scope
     * @return ClientResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function get(string $endpoint, array $params, Scope $scope = Scope::APP): ClientResponse
    {
        $encodedParams = empty($params) ? '' : '?' . http_build_query($params);
        $response = $this->httpClient->get($endpoint . $encodedParams, [
            'headers' => $this->headers($scope),
        ]);
        return new ClientResponse([
            'body' => json_decode((string)$response->getBody(), true),
            'status' => $response->getStatusCode(),
        ]);
    }

    /**
     * @param string $endpoint
     * @param $body
     * @return ClientResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function post(string $endpoint, $body, Scope $scope): ClientResponse
    {
        $response = $this->httpClient->post($endpoint, [
            'body' => $body,
            'headers' => $this->headers($scope),
        ]);
        return new ClientResponse([
            'body' => json_decode($response->getBody(), true),
            'status' => $response->getStatusCode(),
        ]);
    }

    /**
     * @param string $endpoint
     * @param $body
     * @return ClientResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function put(string $endpoint, $body, Scope $scope): ClientResponse
    {
        $response = $this->httpClient->put($endpoint, [
            'body' => $body,
            'headers' => $this->headers($scope),
        ]);
        return new ClientResponse([
            'body' => json_decode($response->getBody(), true),
            'status' => $response->getStatusCode(),
        ]);
    }

    /**
     * @param string $endpoint
     * @return ClientResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function delete(string $endpoint, Scope $scope): ClientResponse
    {
        $response = $this->httpClient->delete($endpoint, [
            'headers' => $this->headers($scope)
        ]);
        return new ClientResponse([
            'body' => json_decode($response->getBody(), true),
            'status' => $response->getStatusCode(),
        ]);
    }

    private function headers(Scope $scope): array
    {
        $appKey = config('onesignal.app_key');
        $userKey = config('onesignal.user_key');
        return $scope === Scope::APP ? [
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $appKey",
        ] : [
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $userKey",
        ];
    }
}