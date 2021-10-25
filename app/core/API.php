<?php

namespace ApiCondor\core;

use ApiCondor\src\providers\ProviderInterface;
use ApiCondor\src\structure\Response;
use JsonSerializable;


abstract class API
{
    /**
     * Send the response.
     *
     * @param JsonSerializable $response
     * @param int $code The HTTP code to send.
     *
     */
    public static function respond(Response $response, $code = 200)
    {
        // Response as JSON
        $response = json_encode($response);

        // Send response headers
        http_response_code($code >= 100 && $code < 600 ? $code : 500);
        header('Cache-Control: no-cache');
        header('Content-Type: application/json');
        header('Content-Length: ' . strlen($response));

        echo $response;
        // End
        exit(0);
    }

    /**
     * Response with an error.
     *
     * @param $errorMessage
     * @param int $errorCode The HTTP error code to set.
     */
    public static function error($errorMessage = "Internal server error", $errorCode = 500)
    {
        self::respond(new Response([], true, $errorMessage, $errorCode,));
    }


}
