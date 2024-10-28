<?php

namespace Lab9\classes;

use Lab9\interfaces\EmployeeInterface;
use Lab9\interfaces\VisitableInterface;
use Lab9\interfaces\VisitorInterface;

class Employee implements EmployeeInterface, VisitableInterface
{
    private string $position;
    private float $salary;

    public function __construct(string $position, float $salary)
    {
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function accept(VisitorInterface $visitor): void
    {
        $visitor->visitEmployee($this);
    }
}