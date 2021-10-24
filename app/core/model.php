<?php

abstract class Model{

    /** @var PDO $db Initializes connection with a database that can later be used in child controllers. */
    public $db = null;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::connect();
    }

    /**
     * Helper turns numeric data to int and empty string to null.
     * @param $data
     * @return mixed
     */
    protected function manageNumericValues(&$data)
    {
        foreach ($data as &$item) {
            if (is_array($item)) {
                array_walk($item, [$this, "setInt"]);
            } else {
                if($item === ''){
                    $item = null;
                }else{
                    $this->setInt($item);
                }
            }
        }
        return $data;
    }

    protected function setInt(&$e)
    {
        if (is_numeric($e)) {
            $e = intval($e);
        }
    }

    /**
     * SQL escape data helper.
     * @param $e
     */
    protected function sqlEscape(&$e)
    {
        if (is_string($e)) {
            $e = $this->db->quote($e);
        }

        if (is_bool($e)) {
            $e ? $e = 1 : $e = 0;
        }

        if (is_null($e)) {
            $e = 'NULL';
        }
    }
}