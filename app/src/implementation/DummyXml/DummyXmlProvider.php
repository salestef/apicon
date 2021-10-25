<?php

namespace ApiCondor\src\implementation\DummyXml;

use ApiCondor\src\providers\XmlProviderAbstract;
use ApiCondor\src\structure\ResponseProvider;

class DummyXmlProvider extends XmlProviderAbstract
{
    /** @var string $providerName Provider Name. */
    public $providerName = "DummyXmlProvider";

    const END_POINT = 'http://apicon.local/website_analytics.xml';

    public function __construct(string $type = "", string $header = "", string $body = "", string $userName = "", string $password = "", string $licenceId = "")
    {
        parent::__construct($type, $header, $body, $userName, $password, $licenceId);
    }

    /**
     * Logic for fetching data from API.
     *
     * @param null $params
     * @return mixed
     */
    public function fetchData($params = null)
    {
        // SOAP - Curl TODO
        $data = new \stdClass();
        $xmlResource = DummyXmlProvider::END_POINT;
        $xml = simplexml_load_file($xmlResource) or die("Error: Cannot create object");
        foreach ((array)$xml->data[0] as $xmlItem => $xmlValue){
            $data->$xmlItem = $this->handleXmlDataTypes($xmlValue);
        }
        return $data;
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

    protected function handleXmlDataTypes($item){
        if(is_numeric($item)) $item = strpos($item, ".") ? floatval($item) : $item = intval($item);
        return $item;
    }
}