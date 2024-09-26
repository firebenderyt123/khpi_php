<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab3\classes\MySQL;
use Lab3\classes\PostgreSQL;

function showResult(array $data): void
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}

$mysql = new MySQL("127.127.126.25", "root", "root", "test");
$psql = new PostgreSQL("localhost", "postgres", "postgres", "postgres", 5432);

echo "PostgreSQL: " .
    $psql->queryBuilder
        ->select("hello")
        ->from("table")
        ->where([["item", "=", 1]])
        ->getSQL() .
    "<br><br>";

try {
    $mysql->connect();
    $sql = $mysql->queryBuilder
        ->select("*, INET_NTOA(ip) as ip")
        ->from("users")
        ->getSQL();
    echo $sql;
    showResult($mysql->query($sql));

    $sql = $mysql->queryBuilder
        ->select("username, INET_NTOA(ip) as ip")
        ->from("users")
        ->where([["ip", ">=", "INET_ATON('127.0.0.2')"]])
        ->limit(1)
        ->getSQL();
    echo $sql;
    showResult($mysql->query($sql));

    $sql = $mysql->queryBuilder
        ->limit(10)
        ->from("users")
        ->where([["ip", ">=", "INET_ATON('127.0.0.2')"],
            ["username", "=", "user3"]])
        ->select("username, INET_NTOA(ip) as ip")
        ->getSQL();
    echo $sql;
    showResult($mysql->query($sql));

    $mysql->close();
} catch (Exception $e) {
    var_dump($e);
}