<?php

namespace Lab3\interfaces;

interface QueryBuilderInterface
{
    public function select(string $column): QueryBuilderInterface;
    public function from(string $table): QueryBuilderInterface;
    public function where(array $conditions): QueryBuilderInterface;
    public function limit(int $limit): QueryBuilderInterface;
    public function getSQL(): string;
}