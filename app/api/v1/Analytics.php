<?php
use ApiCondor\core\AnalyticsAPI;
use ApiCondor\core\ApiController;
use ApiCondor\src\implementation\DummyXml\DummyXmlProvider;
use ApiCondor\src\implementation\GoogleAnalytics\GoogleAnalyticsProvider;
use ApiCondor\src\implementation\DummyDatabase\DummyDatabaseProvider;
use ApiCondor\src\implementation\OtherDummyDatabase\OtherDummyDatabaseProvider;

class Analytics extends ApiController
{
    public function fetch() :JsonSerializable
    {
        AnalyticsAPI::execute(
            [
                new GoogleAnalyticsProvider(),
                new DummyXmlProvider(),
//                new DummyDatabaseProvider(), // TODO for this provider init database `dummy_database.sql` located in public/resources dir.
//                new OtherDummyDatabaseProvider() // TODO for this provider init database `other_dummy.sql` located in public/resources dir.
            ]
        );
    }
}