<?php
use ApiCondor\core\API;
use ApiCondor\core\ApiController;
use ApiCondor\src\implementation\DummyXml\DummyXmlProvider;
use ApiCondor\src\implementation\GoogleAnalytics\GoogleAnalyticsProvider;
use ApiCondor\src\implementation\DummyDatabase\DummyDatabaseProvider;
use ApiCondor\src\implementation\OtherDummyDatabase\OtherDummyDatabaseProvider;

class Analytics extends ApiController
{
    public function fetch() :JsonSerializable
    {
        API::execute(
            [
                new GoogleAnalyticsProvider(),
                new DummyDatabaseProvider(),
                new OtherDummyDatabaseProvider(),
                new DummyXmlProvider()
            ]
        );
    }
}