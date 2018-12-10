<?php

use MVQN\REST\RestClient;
use Tests\MVQN\REST\Examples\Country;

class RestClientTests extends PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        $env = (new \Dotenv\Dotenv(__DIR__."/../../../"))->load();

        RestClient::setBaseUrl(getenv("UCRM_REST_URL"));
        RestClient::setHeaders([
            "Content-Type: application/json",
            "X-Auth-App-Key: ".getenv("UCRM_REST_KEY")
        ]);
    }

    public function testGet()
    {
        RestClient::cacheDir(__DIR__);

        /** @var Country $result */
        $result = Country::get();
        //$result = Country::getByID(249);
        echo $result . "\n";

    }


    public function testValidate()
    {
        $country = new Country(["id" => 249, "name" => "United States"]);

        if(!$country->validate("post", $missing))
        {
            print_r($missing);
        }

        print_r($country->getBoth());

        $this->assertGreaterThan(0, count($missing));
    }


    public function testCall()
    {
        $country = new Country([
            "id" => 249,
            "name" => "United States",
            "code" => "US"
        ]);

        echo $country."\n";

        echo $country->getName()."\n";

        $country->getName();



    }







}
