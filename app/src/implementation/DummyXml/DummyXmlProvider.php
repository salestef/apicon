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
     *
     * @return mixed
     */
    public function fetchData()
    {
        // SOAP - Curl TODO
        $xmlResource = DummyXmlProvider::END_POINT;
        $xml = simplexml_load_file($xmlResource) or die("Error: Cannot create object");
        return $xml;
    }

    /**
     * Providing analytics for client's website.
     *
     * @return ResponseProvider
     */
    public function provide(): ResponseProvider
    {
        $data = $this->fetchData();
        return new ResponseProvider($this->providerName,$data->analytics->value, $data->sessions->value);
    }
}