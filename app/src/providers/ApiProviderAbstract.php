<?php
namespace ApiCondor\src\providers;

use ApiCondor\src\structure\ResponseProvider;

abstract class ApiProviderAbstract implements ProviderInterface
{

    protected $apiKey;

    /** @var  string method we use for API. */
    protected $apiMethod;

    /** @var  string Type or key for GET params forwarded to api. */
    protected $type;

    /** @var array */
    protected $params;

    /**
     * ApiProviderAbstract constructor.
     *
     * @param $apiKey
     * @param $type
     * @param $apiMethod
     * @param array $params
     */
    public function __construct($apiKey, $type, $apiMethod, $params = [])
    {
        $this->apiKey = $apiKey;
        $this->apiMethod = $apiMethod;
        $this->type = $type;
        $this->params = $params;
    }

    /**
     * Logic for fetching data from API.
     *
     * @return mixed
     */
    abstract public function fetchData();

    /**
     * Providing analytics for client's website.
     *
     * @return ResponseProvider
     */
    abstract public function provide() :ResponseProvider;

}