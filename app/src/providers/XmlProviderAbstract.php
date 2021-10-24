<?php
namespace ApiCondor\src\providers;

use ApiCondor\src\structure\ResponseProvider;

abstract class XmlProviderAbstract implements ProviderInterface
{
    /** @var  string Type or key for GET params forwarded to api. */
    protected $type;

    /** @var  string Type or key for GET params forwarded to api. */
    protected $header;

    /** @var  string Type or key for GET params forwarded to api. */
    protected $body;

    /** @var  string Type or key for GET params forwarded to api. */
    protected $userName;

    /** @var  string Type or key for GET params forwarded to api. */
    protected $password;

    /** @var  string Type or key for GET params forwarded to api. */
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
     * Logic for fetching data from API.
     *
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