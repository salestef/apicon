<?php

namespace ApiCondor\src\structure;

class ResponseProvider implements \JsonSerializable
{

    /** @var string|null Provider name. */
    private $providerName;

    /** @var int|null Provider analytics. */
    private $analytics;

    /** @var int|null Number of sessions. */
    private $sessions;

    /**
     * ResponseProvider constructor.
     * @param string|null $providerName
     * @param int|null $analytics
     * @param int|null $sessions
     */
    public function __construct($providerName, $analytics, $sessions)
    {
        $this->providerName = $providerName;
        $this->analytics = $analytics;
        $this->sessions = $sessions;
    }

    /**
     * @return null|string
     */
    public function getProviderName(): ?string
    {
        return $this->providerName;
    }

    /**
     * @return int|null
     */
    public function getAnalytics()
    {
        return $this->analytics;
    }

    /**
     * @return int|null
     */
    public function getSessions()
    {
        return $this->sessions;
    }


    /** @inheritdoc */
    function jsonSerialize()
    {
        return [
            strval($this->providerName) => [
                "analytics" => intval($this->getAnalytics()),
                "sessions" => intval($this->getSessions())
            ]
        ];
    }

}