<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 11:19
     */

namespace Php\Package\Services;

class OpenWeatherApi extends BaseApi
{

    const API_URL = 'http://api.openweathermap.org/data/2.5/weather/';

    public function getWeatherForCity($city)
    {
        $data = json_decode($this->client->getData(self::API_URL . "?APPID=" . $this->apiKey . "&q=" . $city));
        return $this->parseData($data);
    }

    private function parseData($data)
    {
        $currentTemp = $data->main->temp - 273.15;
        return ['currentT' => $currentTemp];
    }

}