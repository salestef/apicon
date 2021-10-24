<?php
use ApiCondor\core\API;
use ApiCondor\src\implementation\DummyXml\DummyXmlProvider;
use ApiCondor\src\implementation\GoogleAnalytics\GoogleAnalyticsProvider;
use ApiCondor\src\implementation\DummyDatabase\DummyDatabaseProvider;
use ApiCondor\src\implementation\OtherDummyDatabase\OtherDummyDatabaseProvider;

class Analytics
{
    public function fetch()
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