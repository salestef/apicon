<?php

namespace ApiCondor\core;

use ApiCondor\src\providers\ProviderInterface;
use ApiCondor\src\structure\Response;


abstract class API
{
    /**
     * @param ProviderInterface[] $providers
     */
    public static function execute(array $providers)
    {
        $message = "";
        $error = false;
        $code = 200;
        $data = [];
        try {
            if (self::providersValidation($providers)) {
                foreach ($providers as $provider) {
                    $data[] = $provider->provide();
                }
            }

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            $code = $ex->getCode();
        }
        self::respond(new Response($error,$message,$data),$code);

    }

    /**
     * Send the response.
     *
     * @param \JsonSerializable $response
     * @param int $code The HTTP code to send.
     *
     */
    public static function respond($response, $code = 200)
    {
        // Response as JSON
        $response = json_encode($response);

        // Include time required to generate in HTTP header
        if (defined('START_TIME')) {
            header('X-Generated: ' . round(microtime(true) - START_TIME, 3) * 1000);
        }

        // Send response headers
        if (!ob_get_contents() && !headers_sent()) {
            http_response_code($code >= 100 && $code < 600 ? $code : 500);
            header('Cache-Control: no-cache');
            header('Content-Type: application/json');
            header('Content-Length: ' . strlen($response));

            echo $response;

        }

        // End
        exit(0);
    }

    /**
     * Response with an error.
     *
     * @param int $errorCode The HTTP error code to set.
     */
    public static function error($errorCode = 500)
    {

        // Error response
        $response = [
            'success' => false,
            'error' => $errorCode
        ];

        /** @var \JsonSerializable $response */
        self::respond($response, $errorCode);
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
