<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 11:19
     */

namespace Php\Package\services;

use Php\Package\WeatherInfo;

class OpenWeatherApi extends BaseApi
{

    const API_URL = 'http://api.openweathermap.org/data/2.5/weather/';

    public function getWeatherForCity($city)
    {
        $data = json_decode($this->client->getData(self::API_URL . "?APPID=" . $this->apiKey . "&q=" . $city));
        return $this->prepareDataForWeatherService($data);
    }

    private function prepareDataForWeatherService($data)
    {
        $preparedData = (object) [];
        $preparedData->currentT = $data->main->temp - 273.15;
        return $preparedData;
    }

}