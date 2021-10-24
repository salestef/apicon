<?php

namespace ApiCondor\src\implementation\GoogleAnalytics;

use ApiCondor\src\providers\ApiProviderAbstract;
use ApiCondor\src\structure\ResponseProvider;

class GoogleAnalyticsProvider extends ApiProviderAbstract
{
    /** @var string $providerName Provider Name. */
    public $providerName = "GoogleAnalyticsProvider";

    const END_POINT = 'http://apicon.local/google.json';

    /**
     * GoogleAnalyticsProvider constructor.
     * @param string $apiKey
     * @param string $type
     * @param string $apiMethod
     */
//    public function __construct($apiKey = "PVxqWUCWI2cVQlD3ZLoL3hxMTDC0L786",$type = "analytics", $apiMethod = "http://google.com")
    public function __construct($apiKey = "", $type = "", $apiMethod = "")
    {
        parent::__construct($apiKey, $type, $apiMethod);
    }

    /**
     * Logic for fetching data from API.
     *
     *
     * @return mixed
     */
    public function fetchData()
    {
//        $path = GoogleAnalyticsProvider::END_POINT . $this->apiMethod . $cityKey . '?apikey=' . $this->apiKey . '&language=en-us&details=true&metric=false%20';
        $path = GoogleAnalyticsProvider::END_POINT;
        return json_decode(file_get_contents($path, true));
    }

    /**
     * Providing analytics for client's website.
     *
     * @return ResponseProvider
     */
    public function provide(): ResponseProvider
    {
        $data = $this->fetchData();
        return new ResponseProvider($this->providerName,$data->analytics, $data->sessions);
    }
}