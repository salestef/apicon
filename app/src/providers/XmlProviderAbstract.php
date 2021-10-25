<?php
namespace ApiCondor\src\providers;

use ApiCondor\src\structure\ResponseProvider;

abstract class XmlProviderAbstract implements ProviderInterface
{
    /** @var  string Type or method we want to fetch. */
    protected $type;

    /** @var  string Header of xml request. */
    protected $header;

    /** @var  string Body of xml request. */
    protected $body;

    /** @var  string Authentication credentials username. */
    protected $userName;

    /** @var  string Authentication credentials password. */
    protected $password;

    /** @var  string Authentication licence ID. */
    protected $licenceId;

    /** @var array */
    protected $params;

    /**
     * All Data needed for SOAP request.
     * XmlProviderAbstract constructor.
     * @param string $type
     * @param string $header
     * @param string $body
     * @param string $userName
     * @param string $password
     * @param string $licenceId
     */
    public function __construct(string $type = "", string $header = "", string $body = "", string $userName = "", string $password = "", string $licenceId = "", $params = [])
    {
        $this->type = $type;
        $this->header = $header;
        $this->body = $body;
        $this->userName = $userName;
        $this->password = $password;
        $this->licenceId = $licenceId;
        $this->params = $params;
    }

    /**
     * Logic for fetching data from XML resource.
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

    /**
     * Handle XML numeric string data types.
     * @param $item
     * @return float|int
     */
    protected function handleXmlDataTypes($item)
    {
        if (is_numeric($item)) $item = strpos($item, ".") ? floatval($item) : $item = intval($item);
        return $item;
    }
}