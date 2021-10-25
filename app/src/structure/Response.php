<?php
namespace ApiCondor\src\structure;

use ApiCondor\src\structure\ResponseProvider;

class Response implements \JsonSerializable
{

    /** @var string|null The Response error. */
    private $error;

    /** @var string|null The Response message. */
    private $message;

    /** @var int|null The Response code. */
    private $code;

    /** @var ResponseProvider[] Get Providers Data. */
    private $data;

    /**
     * Response constructor.
     * @param null|string $error
     * @param null|string $message
     * @param $code
     * @param ResponseProvider[] $data
     */
    public function __construct(array $data = [],$error = false, $message = "", $code = 200)
    {
        $this->error = $error;
        $this->message = $message;
        $this->data = $data;
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return null|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @return ResponseProvider[]
     */
    public function getData()
    {
        return $this->data;
    }

    /** @inheritdoc */
    function jsonSerialize()
    {
        $response = [
            'error' => boolval($this->getError()),
            'code'  => intval($this->getCode()),
            'message' => strval($this->getMessage())
        ];
        if(!$response['error']){ $response['data'] = $this->getData();}
        return $response;
    }

}