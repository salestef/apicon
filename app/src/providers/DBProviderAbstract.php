<?php
namespace ApiCondor\src\providers;

use ApiCondor\src\structure\ResponseProvider;
use ApiCondor\core\Db;

abstract class DBProviderAbstract implements ProviderInterface
{
    /**
     * @var Db $db Db instance - connection.
     */
    protected $db;

    /** @var array */
    protected $params;

    /**
     * DBProviderAbstract constructor.
     *
     * @param Db $db
     * @param array $params
     */
    public function __construct($db,$params = [])
    {
        $this->db = $db;
        $this->params = $params;
    }

    /**
     * Logic for fetching data from Database.
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