<?php

namespace App\Contracts;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;


interface EmployeeServiceContract
{
    public function createEmployee(array $data): Employee;
    public function updateEmployee(int $id, array $data): ?Employee;
    public function deleteEmployee(int $id): bool;

    public function getEmployeeByEmployeeId(string $employeeId): ?Employee;
    public function getEmployeeById(int $id): ?Employee;
    public function getAllEmployees(): ?Collection;

}
