<?php

declare(strict_types=1);

namespace RaspinuOffice\Features;


use Behat\Behat\Context\Context;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\HttpClient\HttpClient;

class CreateGener implements Context
{
    const URL = 'http://localhost:8080';
    private string $body;
    protected $response;
    private string $uri;
    private $client;


    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::URL]);
    }

    /**
     * @Given /^the request body is:$/
     */
    public function theRequestBodyIs(string $body)
    {
        $this->body = $body;
    }

    /**
     * @When /^i Post to "([^"]*)"$/
     */
    public function iPostTo($uri)
    {

        $this->response = $this->client->post($uri, [RequestOptions::JSON => json_decode($this->body, true),
            'headers' => $this->headers]);


    }

    /**
     * @Then /^the response code is (\d+)$/
     */
    public function theResponseCodeIs($code)
    {
        $httpClient = HttpClient::create();
        $this->response = $httpClient->request("POST", self::URL.$this->uri);
        $responseCode = $this->response->getStatusCode();

         return $this->response->getStatusCode() === $code;
    }
}