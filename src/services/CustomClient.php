<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 16:49
     */

namespace Php\Package\services;
use GuzzleHttp\Client;

class CustomClient extends Client
{
    public function getData($url)
    {
        return (string) $this->get($url)->getBody();
    }
}