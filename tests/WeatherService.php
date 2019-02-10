<?php

namespace Php\Package\Tests;

use Php\Package\services\CustomClient;
use Php\Package\services\OpenWeatherApi;
use Php\Package\WeatherService;
use \PHPUnit\Framework\TestCase;

class CustomTestClient
{
    private $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    public function getData()
    {
        return file_get_contents($this->path);
    }
}

class WeatherServiceTest extends TestCase
{
    public function testWeatherServiceWithOpenWeather()
    {
        $city = 'Moscow';
        $path = __DIR__ . './fixtures/openweatherdata';
        $service = new OpenWeatherApi(new CustomClient($path));
        $weather = new WeatherService($service);
        $weatherInfo = $weather->getWeatherForCity($city);
        $this->assertEquals($city, $weatherInfo->getCity());
    }

//    public function testGetCityByWrongIP()
//    {
//        $ip = '95.215.';
//        $city = '';
//        $path = __DIR__ .  '/fixtures/' . $ip;
//        $client = new CustomTestClient($path);
//        $geoIp = new GeoIp($client);
//        $ipInfo = $geoIp->getDataForIp($ip);
//        $this->assertEquals($city, $ipInfo->getCity());
//    }
}
