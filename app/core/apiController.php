<?php

use ApiCondor\src\structure\Response;

abstract class ApiController
{
    /** @var PDO $db Initializes connection with a database that can later be used in child controllers. */
    public $db = null;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->db = DB::connect();
    }

    /**
     * Initializes the model that we need in current controller.
     * @param string $model Name of the model.
     * @return mixed Instance of the model.
     */
    public function model($model)
    {
        require_once '../app/model/' . strtolower($model) . '.php';
        return new $model();
    }

    public function getData($path)
    {
        return json_decode(file_get_contents($path), true);
    }

    abstract public function fetch();
}