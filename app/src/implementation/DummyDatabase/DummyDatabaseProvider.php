<?php

namespace ApiCondor\src\implementation\DummyDatabase;

use ApiCondor\src\providers\DBProviderAbstract;
use ApiCondor\src\structure\ResponseProvider;
use ApiCondor\core\Db;
use PDO;

class DummyDatabaseProvider extends DBProviderAbstract
{
    /** @var string $providerName Provider Name. */
    public $providerName = "DummyDatabaseProvider";

    /**
     * DummyDatabaseProvider constructor.
     */
    public function __construct()
    {
        parent::__construct(new Db('mysql', '127.0.0.1', 'api_condor', 'utf8', 'root', ''));
    }

    /**
     * Logic for fetching data from DB.
     *
     *
     * @return mixed
     */
    public function fetchData()
    {
        $connection = $this->db->connect();
        $sql = "SELECT SUM(`analytics`) AS `analytics`, SUM(`sessions`) AS `sessions` FROM `analytics`";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Providing analytics for client's website.
     *
     * @return ResponseProvider
     */
    public function provide(): ResponseProvider
    {
        $data = $this->fetchData();
        return new ResponseProvider($this->providerName, $data->analytics, $data->sessions);
    }
}