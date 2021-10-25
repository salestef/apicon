<?php
namespace ApiCondor\core;
use PDO;

class Db
{

    /** @var PDO $connection Database connection. */
    protected $connection = null;
    /**
     * @var string $type .
     */
    protected $type;
    /**
     * @var string $type .
     */
    protected $host;
    /**
     * @var string $type .
     */
    protected $name;
    /**
     * @var string $type .
     */
    protected $charset;
    /**
     * @var string $type .
     */
    protected $user;
    /**
     * @var string $type .
     */
    protected $password;

    /**
     * DB constructor.
     * @param string $type
     * @param string $host
     * @param string $name
     * @param string $charset
     * @param string $user
     * @param string $password
     */
    public function __construct(string $type, string $host, string $name, string $charset, string $user, string $password)
    {
        $this->type = $type;
        $this->host = $host;
        $this->name = $name;
        $this->charset = $charset;
        $this->user = $user;
        $this->password = $password;

    }

    /**
     * @return PDO Database connection.
     */
    public function connect()
    {
        if (is_null($this->connection)) {
            try {
                $this->connection = new PDO($this->type . ':host=' . $this->host . ';dbname=' . $this->name . ';charset=' . $this->charset, $this->user, $this->password);
            } catch (PDOException $e) {
                API::error();
            }
        }
        return $this->connection;
    }
}
