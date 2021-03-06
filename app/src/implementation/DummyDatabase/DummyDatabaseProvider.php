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
        parent::__construct(new Db('mysql', '127.0.0.1', 'dummy_database', 'utf8', 'root', ''));
    }

    /**
     * Logic for fetching data from DB.
     *
     * @return mixed
     */
    public function fetchData()
    {
        // TODO Handle params like WHERE for date filter etc...
        $connection = $this->db->connect();
        $sql = "SELECT MAX(`users`) AS `users`, MAX(`bounce_rate`) AS `bounce_rate`, MAX(`sessions`) AS `sessions`, 
MAX(`average_session_duration`) AS `average_session_duration`, MAX(`percentage_new_sessions`) AS `percentage_new_sessions`,
 MAX(`pages_per_session`) AS `pages_per_session`, MAX(`goal_completions`) AS `goal_completions`, MAX(`page_views`) AS `page_views` FROM `analytics`";
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
        return new ResponseProvider(
            $this->providerName, $data->users, $data->bounce_rate, $data->sessions, $data->average_session_duration,
            $data->percentage_new_sessions, $data->pages_per_session, $data->goal_completions, $data->goal_completions,
            );
    }
}