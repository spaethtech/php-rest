<?php

use MVQN\REST\RestClient;
use Tests\MVQN\REST\Examples\Country;

class RestClientTests extends PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        $env = (new \Dotenv\Dotenv(__DIR__ . "/../../rest/"))->load();

        RestClient::setBaseUrl(getenv("UCRM_REST_URL"));
        RestClient::setHeaders([
            "Content-Type: application/json",
            "X-Auth-App-Key: ".getenv("UCRM_REST_KEY")
        ]);
    }

    public function testGet()
    {
        //RestClient::cacheDir(__DIR__);

        //RestClient::get("/countries");

        /** @var Country $result */
        $result = Country::get();
        //$result = Country::getByID(249);
        echo $result . "\n";

    }

    public function testPost()
    {
        $client = [
            "organizationId" => 1,
            "isLead" => true,
            "clientType" => 1,
            "firstName" => "Ryan",
            "lastName" => "Spaeth",
        ];

        $results = RestClient::post("clients", $client);

        var_dump($results);

    }

    public function testPatch()
    {
        $client = [
            "firstName" => "Michelle",
        ];

        $results = RestClient::patch("clients/163", $client);

        var_dump($results);

    }

    public function testDelete()
    {


        $results = RestClient::delete("clients/162");

        var_dump($results);

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
