<?php

namespace Php\Package\Tests;

use Php\Package\services\CustomClient;
use Php\Package\services\MetaWeatherApi;
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
        $path = __DIR__ . '/fixtures/openweatherdata';
        $temp = -5;
        $service = new OpenWeatherApi('', new CustomTestClient($path));
        $weather = new WeatherService($service);
        $weatherInfo = $weather->getWeatherForCity($city);
        $this->assertEquals($temp, $weatherInfo->getCurrentTemp());
    }

//    public function testWeatherServiceWithMetaWeather()
//    {
//        $city = 'St Petersburg';
//        $path = __DIR__ . '/fixtures/metaweatherdata';
//        $temp = -5;
//        $service = new MetaWeatherApi('', new CustomTestClient($path));
//        $weather = new WeatherService($service);
//        $weatherInfo = $weather->getWeatherForCity($city);
//        $this->assertEquals($temp, $weatherInfo->getCurrentTemp());
//    }
}
