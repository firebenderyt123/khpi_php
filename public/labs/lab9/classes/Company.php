<?php

namespace Lab9\classes;

use Lab9\interfaces\CompanyInterface;
use Lab9\interfaces\DepartmentInterface;
use Lab9\interfaces\VisitableInterface;
use Lab9\interfaces\VisitorInterface;

class Company implements CompanyInterface, VisitableInterface
{
    private string $name;
    private array $departments;

    public function __construct(string $name, array $departments)
    {
        $this->name = $name;
        $this->departments = $departments;
    }

    public function addDepartment(DepartmentInterface $department): void
    {
        $this->departments[] = $department;
    }

    public function getDepartments(): array
    {
        return $this->departments;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function accept(VisitorInterface $visitor): void
    {
        $visitor->visitCompany($this);
    }
}