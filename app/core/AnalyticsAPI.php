<?php

namespace ApiCondor\core;

use ApiCondor\core\API;
use ApiCondor\src\providers\ProviderInterface;
use ApiCondor\src\structure\Response;

class AnalyticsAPI extends API
{
    /**
     * @param ProviderInterface[] $providers
     */
    public static function execute(array $providers)
    {
        if (empty($providers)) self::error("Bad Request", 400);
        $data = [];
        foreach ($providers as $provider) {
            if (!$provider instanceof ProviderInterface) self::error("Bad Request", 400);
            $data[] = $provider->provide();
        }
        self::respond(new Response($data));
    }
}