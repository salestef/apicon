<?php
namespace ApiCondor\src\structure;

use ApiCondor\src\structure\ResponseProvider;

class Response implements \JsonSerializable
{

    /** @var string|null The Response error. */
    private $error;

    /** @var string|null The Response message. */
    private $message;

    /** @var ResponseProvider[] Get Providers Data. */
    private $data;

    /**
     * Response constructor.
     * @param null|string $error
     * @param null|string $message
     * @param ResponseProvider[] $data
     */
    public function __construct($error, $message, array $data)
    {
        $this->error = $error;
        $this->message = $message;
        $this->data = $data;
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
     * @return ResponseProvider[]
     */
    public function getData()
    {
        return $this->data;
    }

    /** @inheritdoc */
    function jsonSerialize()
    {
        return [
            'error' => boolval($this->getError()),
            'message' => strval($this->getMessage()),
            'data' => $this->getData()
        ];
    }

}