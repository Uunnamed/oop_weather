<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 09/02/2019
     * Time: 07:16
     */

namespace Php\Package;

use Php\Package\services\MetaWeatherApi;

class WeatherService
{
    private $service;
    public function __construct($service = null, $options = [])
    {
        $apiKey = isset($options['apiKey']) ? $options['apiKey'] : '';
        $this->service = $service ?? new MetaWeatherApi($apiKey);
    }

    public function getWeatherForCity($city)
    {
        $data = $this->service->getWeatherForCity($city);
        return new WeatherInfo($data);
    }
}
