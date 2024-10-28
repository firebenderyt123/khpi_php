<?php

namespace Lab9\interfaces;

interface CompanyInterface
{
    public function addDepartment(DepartmentInterface $department);
    public function getDepartments(): array;
    public function getName(): string;
}