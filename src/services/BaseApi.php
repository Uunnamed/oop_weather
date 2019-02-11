<?php
    /**
     * Created by PhpStorm.
     * User: shipilovaleksei
     * Date: 10/02/2019
     * Time: 14:52
     */

namespace Php\Package\services;

class BaseApi
{
    protected $client;
    protected $apiKey;
    public function __construct($apiKey = '', $client = null)
    {
        $this->apiKey = $apiKey;
        $this->client = $client ?? new CustomClient();
    }

}