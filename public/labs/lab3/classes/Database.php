<?php

namespace Lab3\classes;

use Lab3\interfaces\DatabaseInterface;
use Lab3\interfaces\QueryBuilderInterface;

abstract class Database implements DatabaseInterface
{
    public readonly QueryBuilderInterface $queryBuilder;
    protected readonly string $host;
    protected readonly string $user;
    protected readonly string $passwd;
    protected readonly string $dbname;
    protected readonly int $port;

    public function __construct(string $host, string $user, string $passwd, string $dbname, int $port) {
        $this->host = $host;
        $this->user = $user;
        $this->passwd = $passwd;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->queryBuilder = new QueryBuilder();
    }
}