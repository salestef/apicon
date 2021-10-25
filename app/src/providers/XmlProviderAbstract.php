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
    public function __construct(string $type = "", string $header = "", string $body = "", string $userName = "", string $password = "", string $licenceId = "")
    {
        $this->type = $type;
        $this->header = $header;
        $this->body = $body;
        $this->userName = $userName;
        $this->password = $password;
        $this->licenceId = $licenceId;
    }

    /**
     * Logic for fetching data from XML resource.
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