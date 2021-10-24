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

    /**
     * DBProviderAbstract constructor.
     *
     * @param Db $db
     */
    public function __construct($db)
    {
        $this->db = $db;
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