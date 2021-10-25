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
        if (empty($providers)) self::error("Bad Request",400);
        $data = [];
        $error = false;
        $message = "";
        $code = 200;
        try {
            if (self::providersValidation($providers)) {
                foreach ($providers as $provider) {
                    $data[] = $provider->provide();
                }
            }

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            $code = $ex->getCode();
            self::error($message,$code);
        }
//        var_dump($data);die;

        self::respond(new Response($data, $error, $message, $code));
    }

    /**
     * @param $providers
     * @return bool
     * @throws \Exception
     */
    public static function providersValidation($providers)
    {
        if (!empty($providers)) {
            array_filter($providers, function ($provider) {
                if (!$provider instanceof ProviderInterface) {
                    throw new \Exception("Invalid input", 402);
                }
            });
        } else throw new \Exception("Invalid input", 401);
        return true;
    }
}