<?php

namespace Lab9\interfaces;

interface DepartmentInterface
{
    public function addEmployee(EmployeeInterface $employee);
    public function getEmployees(): array;
    public function getName(): string;
}