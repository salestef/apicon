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

    /**
     * ApiProviderAbstract constructor.
     *
     * @param $apiKey
     * @param $type
     * @param $apiMethod
     */
    public function __construct($apiKey, $type, $apiMethod)
    {
        $this->apiKey = $apiKey;
        $this->apiMethod = $apiMethod;
        $this->type = $type;
    }

    /**
     * Logic for fetching data from API.
     *
     *
     * @param null $params
     * @return mixed
     */
    abstract public function fetchData($params = null);

    /**
     * Providing analytics for client's website.
     *
     * @return ResponseProvider
     */
    abstract public function provide() :ResponseProvider;

}