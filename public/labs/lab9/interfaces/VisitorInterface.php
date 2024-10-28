<?php

namespace Lab9\interfaces;

interface VisitorInterface
{
    public function visitEmployee(EmployeeInterface $employee);
    public function visitDepartment(DepartmentInterface $department);
    public function visitCompany(CompanyInterface $company);
}