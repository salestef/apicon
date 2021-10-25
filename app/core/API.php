<?php

namespace ApiCondor\core;

use ApiCondor\src\providers\ProviderInterface;
use ApiCondor\src\structure\Response;


abstract class API
{


    /**
     * Send the response.
     *
     * @param \JsonSerializable $response
     * @param int $code The HTTP code to send.
     *
     */
    public static function respond(Response $response, $code = 200)
    {
        // Response as JSON
        $response = json_encode($response);
        echo $response;

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
     * @param $errorMessage
     * @param int $errorCode The HTTP error code to set.
     */
    public static function error($errorMessage, $errorCode = 500)
    {
        self::respond(new Response([], true, $errorMessage, $errorCode,));
    }



}
