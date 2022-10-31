<?php
declare(strict_types=1);

namespace SpaethTech\REST;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

use SpaethTech\REST\Examples\Country;

/**
 * Class RestClientTests
 * @package SpaethTech\REST
 * @author Ryan Spaeth <rspaeth@spaethtech.com>
 */
class RestClientTests extends TestCase
{
    protected function setUp(): void
    {
        (new Dotenv(__DIR__ . "/../../"))->load();

        RestClient::setBaseUrl(getenv("REST_URL"));
        RestClient::setHeaders([
            "Content-Type: application/json",
            "X-Auth-App-Key: ".getenv("REST_KEY")
        ]);
    }

    public function testGetRaw()
    {
        var_dump(RestClient::get("/countries"));
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

    public function testGetById()
    {
        //RestClient::cacheDir(__DIR__);

        //RestClient::get("/countries");

        /** @var Country $result */
        $result = Country::getById(249);
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
