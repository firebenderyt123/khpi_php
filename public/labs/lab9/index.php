<?php

require __DIR__ . '/../../../vendor/autoload.php';

use Lab9\classes\Employee;
use Lab9\classes\Department;
use Lab9\classes\Company;
use Lab9\classes\SalaryReport;

$employee1 = new Employee("Developer", 1000);
$employee2 = new Employee("Designer", 1200);
$employee3 = new Employee("Manager", 1500);

$department1 = new Department("IT", [
    $employee1,
    $employee2
]);

$department2 = new Department("HR", [$employee3]);

$company = new Company("My company", [$department1, $department2]);

echo "<br>--- Salary Report For Employee ---<br>";
$salaryReportForEmployee3 = new SalaryReport();
$employee3->accept($salaryReportForEmployee3);

echo "<br>--- Salary Report For Department ---<br>";
$salaryReportForDepartment = new SalaryReport();
$department1->accept($salaryReportForDepartment);

echo "<br>--- Salary Report For Company ---<br>";
$salaryReportForCompany = new SalaryReport();
$company->accept($salaryReportForCompany);