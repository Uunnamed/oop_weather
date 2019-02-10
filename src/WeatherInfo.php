<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 13:51
     */

namespace Php\Package;


class WeatherInfo
{
    private $minT;
    private $maxT;
    private $currentT;
    private $date;
    private $windSpeed;

    public function __construct($data)
    {
        $this->currentT = $data->currentT;
    }

    public function getCurrentTemp()
    {
        return $this->currentT;
    }
}