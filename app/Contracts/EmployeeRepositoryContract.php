<?php

namespace App\Contracts;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Collection;

interface EmployeeRepositoryContract
{
    /**
     * Get all employees
     *
     * @return Collection
     */
    public function getAllEmployees(): Collection;

    /**
     * Get employee by ID
     *
     * @param int $id
     * @return Employee|null
     */
    public function getEmployeeById(int $id): ?Employee;

    /**
     * Get employee by employee ID
     *
     * @param string $employeeId
     * @return Employee|null
     */
    public function getEmployeeByEmployeeId(string $employeeId): ?Employee;

    /**
     * Create a new employee
     *
     * @param array $data
     * @return Employee
     */
    public function createEmployee(array $data): Employee;

    /**
     * Update an existing employee
     *
     * @param int $id
     * @param array $data
     * @return Employee|null
     */
    public function updateEmployee(int $id, array $data): ?Employee;

    /**
     * Delete an employee
     *
     * @param int $id
     * @return bool
     */
    public function deleteEmployee(int $id): bool;
}
