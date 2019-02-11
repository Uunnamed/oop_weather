<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 15:55
     */

namespace Php\Package\Services;


class MetaWeatherApi extends BaseApi
{
    const API_SEARCH_CITYID_URL = 'https://www.metaweather.com/api/location/search/?query=';
    const API_GETWEATHER_URL = 'https://www.metaweather.com/api/location/';

    public function getWeatherForCity($city)
    {
        $data = json_decode($this->client->getData(self::API_GETWEATHER_URL . urlencode($this->getCityId($city))));
        return $this->parseData($data);
    }

    private function getCityId($city)
    {
        return json_decode($this->client->getData(self::API_SEARCH_CITYID_URL . $city))[0]->woeid;
    }

    private function parseData($data)
    {
        $currentTemp = $data->consolidated_weather[0]->the_temp;
        return ['currentT' => $currentTemp];
    }
}