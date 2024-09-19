<?php

namespace Lab3\classes;

use Exception;
use Lab3\interfaces\QueryBuilderInterface;

class QueryBuilder implements QueryBuilderInterface
{
    protected array $select = [];
    protected string $from = "";
    protected array $where = [];
    protected int | null $limit = null;

    public function __construct()
    {
        $this->reset();
    }

    public function select(string $column): QueryBuilderInterface
    {
        $this->select[] = $column;
        return $this;
    }

    public function from(string $table): QueryBuilderInterface
    {
        $this->from = $table;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function where(array $conditions): QueryBuilderInterface
    {
        foreach ($conditions as $condition) {
            if (is_array($condition) && count($condition) === 3) {
                list($column, $operator, $value) = $condition;

                if (is_string($value) && !preg_match('/\(.*?\)/', $value)) {
                    $value = "'$value'";
                } elseif (is_null($value)) {
                    $value = 'NULL';
                }

                $this->where[] = "$column $operator $value";
            } else {
                throw new Exception("Invalid where condition format");
            }
        }

        return $this;
    }

    public function limit(int $limit): QueryBuilderInterface
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function getSQL(): string
    {
        if (empty($this->select) || empty($this->from)) {
            throw new Exception("SELECT and FROM clauses are mandatory");
        }

        $query = "SELECT " . implode(', ', $this->select) . " FROM " . $this->from;

        if (!empty($this->where)) {
            $query .= " WHERE " . implode(' AND ', $this->where);
        }

        if ($this->limit !== null) {
            $query .= " LIMIT " . $this->limit;
        }

        $this->reset();
        return $query . ";";
    }

    private function reset(): void
    {
        $this->select = [];
        $this->from = "";
        $this->where = [];
        $this->limit = null;
    }
}