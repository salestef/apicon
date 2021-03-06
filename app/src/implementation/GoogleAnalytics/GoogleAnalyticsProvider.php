<?php

namespace ApiCondor\src\implementation\GoogleAnalytics;

use ApiCondor\src\providers\ApiProviderAbstract;
use ApiCondor\src\structure\ResponseProvider;

class GoogleAnalyticsProvider extends ApiProviderAbstract
{
    /** @var string $providerName Provider Name. */
    public $providerName = "GoogleAnalyticsProvider";

    private $endpoint = PUBLIC_FOLDER . DIRECTORY_SEPARATOR .'resources' . DIRECTORY_SEPARATOR . 'google.json';

    /**
     * GoogleAnalyticsProvider constructor.
     * @param string $apiKey
     * @param string $type
     * @param string $apiMethod
     */
    public function __construct($apiKey = "", $type = "", $apiMethod = "")
    {
        parent::__construct($apiKey, $type, $apiMethod);
    }

    /**
     * Logic for fetching data from API.
     *
     * @return mixed
     */
    public function fetchData()
    {
        // TODO Build URI and add PARAMS, METHODS, API TOKEN etc...
        // TODO Handle POST, GET requests using curl
        // TODO Authentication
        $path = $this->endpoint;
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
        return new ResponseProvider(
            $this->providerName, $data->users, $data->bounce_rate, $data->sessions, $data->average_session_duration,
            $data->percentage_new_sessions, $data->pages_per_session, $data->goal_completions, $data->goal_completions,
            );
    }
}