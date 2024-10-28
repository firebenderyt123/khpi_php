<?php

namespace Lab9\classes;

use Lab9\interfaces\Company;
use Lab9\interfaces\CompanyInterface;
use Lab9\interfaces\Department;
use Lab9\interfaces\DepartmentInterface;
use Lab9\interfaces\EmployeeInterface;
use Lab9\interfaces\VisitorInterface;

class SalaryReport implements VisitorInterface
{
    private float $totalSalary = 0;

    public function visitEmployee(EmployeeInterface $employee): void
    {
        $this->totalSalary += $employee->getSalary();
        echo "Employee position: {$employee->getPosition()}, Salary: {$employee->getSalary()}<br>";
    }

    public function visitDepartment(DepartmentInterface $department): void
    {
        echo "Department: {$department->getName()}<br>";
        foreach ($department->getEmployees() as $employee)
        {
            $employee->accept($this);
        }
    }

    public function visitCompany(CompanyInterface $company): void
    {
        echo "Company: {$company->getName()}<br>";
        foreach ($company->getDepartments() as $department)
        {
            $department->accept($this);
        }
        echo "Total Salary: {$this->totalSalary}<br>";
    }
}