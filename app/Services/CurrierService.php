<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrierService
{
    private string $api_url = 'https://open-api.waiteer.com/api/{endpoint}';
    private string $test_api_url = 'https://stoplight.io/mocks/waiteer/openapi/6498019/api/{endpoint}';
    private mixed $endpoint;
    private mixed $params;
    private string $method = 'post';
    private array $headers = [
        "Content-Type" => "application/json",
        "X-Api-Key" => "gencay",
        "X-Partner-Id" => "kete",
        "X-Place-Id" => "52"
    ];
    private bool $test_mode = false;

    public function get()
    {
        $method = $this->getMethod();
        if ($method == 'post') {
            $request = Http::withHeaders($this->headers)->post($this->createEndpointUrl(), $this->params);
        } else {
            $request = Http::get($this->createEndpointUrl(), $this->params);
        }

        if ($request->clientError() || $request->serverError()) {
            //return $request->body();
            throw new \Exception($request->reason());
        }

        return $request->object();
    }

    public function dd(): array
    {
        return [
            'url' => $this->getApiUrl(),
            'endpoint' => $this->getEndpoint(),
            'endpoint_url' => $this->createEndpointUrl(),
            'headers' => $this->getHeaders(),
            'data' => $this->getParams()
        ];
    }

    public function calculateDistance()
    {
        $client = new CurrierService();
        $client->setEndpoint("deliveries/distance");
        $client->setMethod('post');
        $client->setParams([
            "customerAddress" => "string",
            "restaurantAddress" => "string",
            "customerLatitude" => 0,
            "customerLongitude" => 0,
            "restaurantLatitude" => 0,
            "restaurantLongitude" => 0,
            "city" => "string",
            "calculateGeo" => true,
            "zipCode" => "string",
            "preparationTime" => 0
        ]);

        return $client->get();
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function createEndpointUrl(): array|string
    {
        return str_replace('{endpoint}', $this->getEndpoint(), $this->getApiUrl());
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        if ($this->isTestMode()) {
            return $this->test_api_url;
        }
        return $this->api_url;
    }

    /**
     * @param string $api_url
     */
    public function setApiUrl(string $api_url): void
    {
        $this->api_url = $api_url;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed $endpoint
     */
    public function setEndpoint($endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->test_mode;
    }

    /**
     * @param bool $test_mode
     */
    public function setTestMode(bool $test_mode): void
    {
        $this->test_mode = $test_mode;
    }


}
