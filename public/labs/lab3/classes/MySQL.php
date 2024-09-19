<?php

namespace Lab3\classes;

use Exception;
use mysqli;

class MySQL extends Database
{
    protected mysqli $connection;

    public function __construct(string $host, string $user, string $passwd, string $dbname, int $port = 3306)
    {
        parent::__construct($host, $user, $passwd, $dbname, $port);
    }

    /**
     * @throws Exception
     */
    public function connect(): void
    {
        $this->connection = new mysqli($this->host, $this->user, $this->passwd, $this->dbname, $this->port);
        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * @throws Exception
     */
    public function query(string $sql): array
    {
        $stmt = $this->connection->prepare($sql);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $this->connection->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        if ($result === false) {
            throw new Exception("Query failed: " . $this->connection->error);
        }

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $stmt->close();
        return $rows;
    }

    public function close(): void
    {
        $this->connection->close();
    }
}