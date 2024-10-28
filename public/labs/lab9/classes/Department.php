<?php

namespace Lab9\classes;

use Lab9\interfaces\DepartmentInterface;
use Lab9\interfaces\EmployeeInterface;
use Lab9\interfaces\VisitableInterface;
use Lab9\interfaces\VisitorInterface;

class Department implements DepartmentInterface, VisitableInterface
{
    private string $name;
    private array $employees;

    public function __construct(string $name, array $employees)
    {
        $this->name = $name;
        $this->employees = $employees;
    }

    public function addEmployee(EmployeeInterface $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function accept(VisitorInterface $visitor): void
    {
        $visitor->visitDepartment($this);
    }
}